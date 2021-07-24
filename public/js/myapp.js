var textarea = document.querySelector('.textarea')
if(textarea) {
    textarea.addEventListener('mouseenter', function (e) {
        e.target.classList.add('border-2','border-red-400', 'shadow-md')
    })
    textarea.addEventListener('mouseleave', function (e) {
        e.target.classList.remove('border-2','border-red-400', 'shadow-md')
    })
}


//show number of char in textarea use keyup not keydown

function textCounter(field, field2, maxlimit) {




   if(field.value.charAt(field.value.length-1) === '@') {


       var xmlhttpreq = new XMLHttpRequest();
       var show_users = document.querySelector('.show_users');


       xmlhttpreq.onreadystatechange = function () {

           if (xmlhttpreq.readyState == xmlhttpreq.DONE && xmlhttpreq.status == 200) {

               if (xmlhttpreq.response != '') {

                   var usernames = JSON.parse(xmlhttpreq.response);

                   var select = document.createElement('select');


                   select.classList.add('absolute', 'select', 'bottom-0', 'right-0', 'mt-1', 'mb-2', 'p-2', 'transform', 'translate-y-full')
                   show_users.appendChild(select);


                   var option = new Option('Select username', '');
                   option.classList.add('text-gray-700', 'font-bold')
                   select.add(option);


                   for (var i = 0; i < usernames.length; i++) {
                       var option = new Option('@' + usernames[i], '@' + usernames[i]);
                       select.add(option);
                   }

                   select.onchange = function () {
                       if (this.value != '' && field.value.length <= (maxlimit-this.value.length)) {
                           field.value = field.value + this.value;
                       }
                     document.querySelectorAll('.select').forEach((element) => {
                         element.remove();
                     });


                   }


               }
           }
       }
           xmlhttpreq.open('GET', '/api/username');
           xmlhttpreq.send();
       }



   //shange color and prevent more character
    var countfield = document.getElementById(field2);
    if (field.value.length > maxlimit) {

        field.value = field.value.substring(0, maxlimit);
        return false;
    } else {
        countfield.value = maxlimit - field.value.length;
        if (countfield.value >= 10) {
            countfield.style.color = 'gray';
        } else {
            countfield.style.color = 'red';
        }
    }
}


//to show delete button for auth tweet
var tweet_div = document.querySelectorAll('.tweet')

for (var i = 0; i < tweet_div.length; i++) {

    if (tweet_div[i] &&
        tweet_div[i].children[1].children[0].children[2]) {

        tweet_div[i].addEventListener('mouseenter', function (e) {
            delete_tweet_button = e.target.children[1].children[0].children[2]
            delete_tweet_button.style.display = 'block'
        })

        tweet_div[i].addEventListener('mouseleave', function (e) {
            delete_tweet_button = e.target.children[1].children[0].children[2]
            delete_tweet_button.style.display = 'none'
        })

    }
}


//     //add flash massage
// window.addEventListener('load' , function () {
//     var notifyMessage = document.querySelector('.notify-message')
//
//     if(notifyMessage){
//         // notifyMessage.classList.add('show');
//         notifyMessage.style.opacity = 'block'
//         setTimeout(() => {
//             // notifyMessage.classList.remove('show')
//             notifyMessage.style.display = 'none'
//         } , 3500)
//     }

// })

//flash message hidden
window.addEventListener('turbolinks:load' , () => {

    const flashMessage = document.querySelector('.alert')

    const fadeOutFlashMessage = () => {
        const time_id = setInterval(() => {

            const opacity = flashMessage.style.opacity;

            if (opacity > 0) {
                flashMessage.style.opacity = opacity - 0.02
            } else {
                flashMessage.style.display = 'none'
                clearInterval(time_id)
            }

        }, 50)
    }

    if(flashMessage != null){
        flashMessage.style.opacity = 1
        setTimeout(
            fadeOutFlashMessage
            ,2500)
    }


    //how  to show image when upload with out ajax

    var upload  = document.querySelector('#upload');
    if(upload) {
        upload.onclick = function () {

            var file = document.querySelector('#file-input');
            file.onchange = function (event) {

                var showEmage = document.querySelector('#show_image');
                showEmage.style.display = 'block';

                var image = document.querySelector('#image_upload');
                image.src = URL.createObjectURL(event.target.files[0]);
            }
        }
    }


    var removeImage = document.querySelector('#remove_image');
    if(removeImage){
        removeImage.onclick = function (e) {
            e.preventDefault();
            var showEmage = document.querySelector('#show_image');
            showEmage.style.display = 'none';
        }
    }




    //show image for  edit profile
    var avatar_file = document.querySelector('#avatar');
    if(avatar_file) {
        avatar_file.onchange = function (event) {
            var image = document.querySelector('#show_avatar');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    }

    var banner_file = document.querySelector('#banner');
    if(banner_file) {
        banner_file.onchange = function (event) {
            var image = document.querySelector('#show_banner');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    }

})
