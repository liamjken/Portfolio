document.addEventListener('DOMContentLoaded', () => {
    const imageField = document.getElementById('image_url');
    const uploadButton = document.getElementById('upload_image_button');

    uploadButton.addEventListener('click', () => {
        let mediaUploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Select'
            },
            multiple: false
        });

        mediaUploader.on('select', () => {
            let attachment = mediaUploader.state().get('selection').first().toJSON();
            imageField.value = attachment.url;
        });

        mediaUploader.open();
    });

});