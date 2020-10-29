(function ($) {

    $.fn.filemanager = function (type, options, multi) {
        type = type || 'file';

        this.on('click', function (e) {
            console.log(multi);
            var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
            var target_input = $('#' + $(this).data('input'));
            var target_preview = $('#' + $(this).data('preview'));
            var target_images = $('#images');
            window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                    return item.url;
                }).join(',');

                // set the value of the desired input to image url
                target_input.val('').val(file_path).trigger('change');

                // clear previous preview
                target_preview.html('');

                if (multi) {
                    target_images.val(file_path);

                    // set or change the preview image src
                    items.forEach(function (item) {
                        console.log(item);
                        target_preview.append(
                            $('<li><img src="' + item.url + '" id="thumbnails"><span class="cancel">X</span></li>')
                        );
                        //$('#thumbnails').css('height', '5rem').css('margin', '10px').attr('src', item.thumb_url);
                    });


                    $('.cancel').on('click', function () {
                        console.log('HELLO');
                        this.closest('li').remove();
                        let value='';

                        if ($("#holder > li").length > 0) {

                            $("#holder > li").each(function () {

                                value += $(this).children("img").attr('src') + ','
                            });
                            value = value.replace(/,\s*$/, "");
                            $('#images').val(value);
                        }

                        else {
                            $('#images').val('');
                        }
                    })
                }

                // trigger change event
                target_preview.trigger('change');
            };
            return false;
        });
    }

})(jQuery);
