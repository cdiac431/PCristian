(function () {

    setTimeout(function() { $("#fade-out").fadeOut(2000); }, 2000);



    let dropdown = $('#avatar-dropdown');
    let timeout = null;
    $('#profile').on('mouseover', function () {
        dropdown.addClass('animation-slide-up');
    });

    $('#profile').on('mouseleave', function () {
        if (timeout != null) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function(){ dropdown.removeClass('animation-slide-up'); }, 100);

    });

    dropdown.on('mouseover', function() {
        if (timeout != null) {
            clearTimeout(timeout);
        }
    });

    dropdown.on('mouseleave', function() {
        dropdown.removeClass('animation-slide-up');
    });

    $('[id="drag-n-drop"]').each( function() {
        const dragndrop = $(this);
        const input = dragndrop.children('#drag-n-drop-file');
        const accept = input.attr('accept').replace(/\s+/g, '').split(',');

        const icon = dragndrop.find('#drag-n-drop-icon');
        const title = dragndrop.find('#drag-n-drop-title');

        const iconOrig = icon.html();
        const titleOrig = title.html();

        dragndrop.on({
            dragover: function() {
                dragndrop.addClass('active');
            },
            dragleave: function() {
                dragndrop.removeClass('active');
            },
            drop: function() {
                dragndrop.removeClass('active');
            }
        });

        input.change( function() {
            //afegir comporbació de formats de fitxers
            if (this.files.length > 1) {
                Array.from(this.files).forEach( file => {
                    if (!accept.includes(file.type)) {

                        input.val('');

                        icon.html('<i class="fas fa-exclamation-triangle text-danger"></i>');
                        title.html('<strong class="text-danger">Format de fitxer incorrecte!</strong>');

                        setTimeout(function(){
                            icon.html(iconOrig);
                            title.html(titleOrig);
                        }, 3000);
                    } else {
                        icon.html('<i class="fas fa-file-alt"></i>');
                        title.html(this.files.length.toString() + " fitxers afegits!");
                    }
                });

            } else {
                if (!accept.includes(this.files[0].type)) {
                    input.val('');

                    icon.html('<i class="fas fa-exclamation-triangle text-danger"></i>');
                    title.html('<strong class="text-danger">Format de fitxer incorrecte!</strong>');

                    setTimeout(function(){
                        icon.html(iconOrig);
                        title.html(titleOrig);
                    }, 3000);
                } else {
                    icon.html('<i class="fas fa-file-alt"></i>');
                    title.html(this.files[0].name);
                }
            }
        });
    });
})();
