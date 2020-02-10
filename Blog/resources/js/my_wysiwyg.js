(function($) {
    $.fn.my_wysiwyg=function(options) {
        // creation of the buttons's options
        var btn = {
            buttons: ["bold", "italic", "underline", "strike", "color", "size", "link", "left", "right", "center", "justify", "switch", "youtube"]
        };
        /* create settings of plugin source :
         * https://www.youtube.com/watch?v=s18tL6dohxM */
        var settings = $.extend(btn, options);

        $(this).each(function() {

            $(this).wrap("<div class='my_wysiwyg'></div>");
            var my_parent = $(this).parent();

            // create wysiwyg textarea.
            my_parent.append("<div class='editor' contenteditable='true'></div>");
            $(this).hide();

            my_parent.prepend("<div class='menu'></div>");

            //add button bold with set text bolding
            my_parent.find(".menu").append("<button class='bold btn'><span class='fas fa-bold'></span></button>");
            my_parent.find(".bold").click(function() {
                document.execCommand('bold');
            });

            //add button italic with set text italic
            my_parent.find(".menu").append("<button class='italic btn'><span class='fas fa-italic'></span></button>");
            my_parent.find(".italic").click(function() {
                document.execCommand('italic');
            });

           //add button underline with set text underlined
           my_parent.find(".menu").append("<button class='underline btn'><span class='fas fa-underline'></span></button>");
           my_parent.find(".underline").click(function() {
               document.execCommand('underline');
           });

            //add button strike with set text strike
            my_parent.find(".menu").append("<button class='strike btn'><span class='fas fa-strikethrough'></span></button>");
            my_parent.find(".strike").click(function() {
                document.execCommand('strikeThrough');
            });

            //add select menu with set text color
            my_parent.find(".menu").append("<select class='color btn'></select>");
            my_parent.find(".color").append("<option class='black btn'>Color</option>");
            my_parent.find(".color").append("<option class='red btn'>Red</option>");
            my_parent.find(".color").append("<option class='blue btn'>Blue</option>");
            my_parent.find(".color").append("<option class='green btn'>Green</option>");
            my_parent.find(".black").click(function() {
                document.execCommand('foreColor',false, 'black');
            });
            my_parent.find(".red").click(function() {
                document.execCommand('foreColor',false, 'red');
            });
            my_parent.find(".blue").click(function() {
                document.execCommand('foreColor',false, 'blue');
            });
            my_parent.find(".green").click(function() {
                document.execCommand('foreColor',false, 'green');
            });

            //add select menu with set text size
            my_parent.find(".menu").append("<select class='size btn'></select>");
            my_parent.find(".size").append("<option class='12px'>12px</option>");
            my_parent.find(".size").append("<option class='16px'>16px</option>");
            my_parent.find(".size").append("<option class='20px'>20px</option>");
            my_parent.find(".size").append("<option class='24px'>24px</option>");
            my_parent.find(".size").append("<option class='30px'>30px</option>");
            my_parent.find(".size").append("<option class='35px'>35px</option>");
            my_parent.find(".size").append("<option class='40px'>40px</option>");
            my_parent.find(".12px").click(function() {
                document.execCommand('fontSize',false, '1');
            });
            my_parent.find(".16px").click(function() {
                document.execCommand('fontSize',false, '2');
            });
            my_parent.find(".20px").click(function() {
                document.execCommand('fontSize',false, '3');
            });
            my_parent.find(".24px").click(function() {
                document.execCommand('fontSize',false, '4');
            });
            my_parent.find(".30px").click(function() {
                document.execCommand('fontSize',false, '5');
            });
            my_parent.find(".35px").click(function() {
                document.execCommand('fontSize',false, '6');
            });
            my_parent.find(".40px").click(function() {
                document.execCommand('fontSize',false, '7');
            });

            //add button link with set link on text with prompt
            my_parent.find(".menu").append("<button class='link btn'><span class='fas fa-link'></span></button>");
            my_parent.find(".link").click(function() {
                var linkURL = prompt('Enter a URL:', 'http://');
                document.execCommand('createLink', false, linkURL);
            });

            //add button left with set text justify left
            my_parent.find(".menu").append("<button class='left btn'><span class='fas fa-align-left'></span></button>");
            my_parent.find(".left").click(function() {
                document.execCommand('justifyLeft');
            });

            //add button center with set text justify center
            my_parent.find(".menu").append("<button class='center btn'><span class='fas fa-align-center'></span></button>");
            my_parent.find(".center").click(function() {
                document.execCommand('justifyCenter');
            });

            //add button right with set text justify right
            my_parent.find(".menu").append("<button class='right btn'><span class='fas fa-align-right'></span></button>");
            my_parent.find(".right").click(function() {
                document.execCommand('justifyRight');
            });

            //add button link with set link on text with prompt
            my_parent.find(".menu").append("<button class='link btn'><span class='fas fa-link'></span></button>");
            my_parent.find(".link").click(function() {
                var linkURL = prompt('Enter a URL:', 'http://');
                document.execCommand('createLink', false, linkURL);
            });

            my_parent.find(".menu").append("<button class='btn switch'><span class='fas fa-code'></span></button>");
            var check = 1;
            my_parent.find(".switch").click(function() {
                if (check == 1)
                {
                    var sourcecode = $(".editor").html();
                    $(".editor").text(sourcecode);
                    check = 0
                }
                else
                {
                    var interpreted = $(".editor").text();
                    $(".editor").html(interpreted)
                    check = 1;
                }
            });

            //add button link with set link on text with prompt
            my_parent.find(".menu").append("<button class='video btn'><span class='fab fa-youtube'></span></button>");
            my_parent.find(".video").click(function()
                {
                    var linkURL = prompt('Enter a URL:', '');
                    var isYoutube = linkURL.search('youtube');
                    if (isYoutube == 12)
                    {
                        linkURL = linkURL.replace('watch?v=', 'embed/');
                        my_parent.find(".editor").append("<iframe id='player' type='text/html' width='640' height='360'src='"+linkURL+"' frameborder='0'></iframe>");
                    }
                    else if(isYoutube != 12)
                    {
                        linkURL = linkURL.replace('video', 'embed/video');
                        my_parent.find(".editor").append("<iframe id='player' type='text/html' width='640' height='360'src='"+linkURL+"' frameborder='0'></iframe>");
                        console.log(linkURL);
                    }
                });

            $("head").append("<style type='text/css'> .btn:hover{border-left :1px solid black;border-right :1px solid black;} </style>");

            $(".btn").css("background", "#e5e5e5").css("padding", "5px 7px")
                .css("height", "35px").css("width", "35px");
            $(".size").css("width", "60px");
            $(".color").css("width", "60px");
            $("style").append(".btn:first-child{border-top-left-radius:4px;border-bottom-left-radius:4px}")
            $("style").append(".btn:last-child{border-top-right-radius:4px;border-bottom-right-radius:4px}")
        });
    }
})($);
