tinymce.init({
    selector: '.tiny-editor',
    plugins: ' anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontsize | bold italic underline strikethrough align | link image | emoticons charmap table | checklist numlist bullist indent outdent' ,
    tinycomments_mode: 'embedded',
    tinycomments_author: 'BSV',
    relative_urls: false,
    mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
    ],
    image_class_list: [
        { title: 'Responsive', value: 'img-responsive' },
        { title: 'Responsive Double', value: 'img-responsive-double' },
        // Добавьте свои стили, если необходимо
    ],
    image_dimensions: true,
    setup: function (editor) {
        editor.on('BeforeSetContent', function (e) {
            // Функция для обработки вставленных изображений и установки им максимальных размеров
            var dom = editor.dom;
            var images = dom.select('img');

            for (var i = 0; i < images.length; i++) {
                var image = images[i];

                // Максимальные размеры (в пикселях)
                var maxWidth = 800;
                var maxHeight = 600;

                // Получаем текущие размеры изображения
                var currentWidth = image.width;
                var currentHeight = image.height;

                // Проверяем, нужно ли изменять размер изображения
                if (currentWidth > maxWidth || currentHeight > maxHeight) {
                    // Вычисляем новые размеры, сохраняя пропорции
                    if (currentWidth / maxWidth > currentHeight / maxHeight) {
                        image.width = maxWidth;
                        image.height = (currentHeight / currentWidth) * maxWidth;
                    } else {
                        image.height = maxHeight;
                        image.width = (currentWidth / currentHeight) * maxHeight;
                    }
                }
            }
        })
    },
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    file_picker_callback : elFinderBrowser,
});

function elFinderBrowser (callback, value, meta) {
    tinymce.activeEditor.windowManager.openUrl({
        title: 'File Manager',
        url: '/elfinder/tinymce5',
        /**
         * On message will be triggered by the child window
         *
         * @param dialogApi
         * @param details
         * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
         */
        onMessage: function (dialogApi, details) {
            if (details.mceAction === 'fileSelected') {
                const file = details.data.file;

                // Make file info
                const info = file.name;

                // Provide file and text for the link dialog
                if (meta.filetype === 'file') {
                    callback(file.url, {text: info, title: info});
                }

                // Provide image and alt text for the image dialog
                if (meta.filetype === 'image') {
                    callback(file.url, {alt: info});
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype === 'media') {
                    callback(file.url);
                }

                dialogApi.close();
            }
        }
    });
}
