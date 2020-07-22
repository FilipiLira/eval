function starsEvaluation() {
    $('.star').each((i, elem) => {
        $(elem).hover(() => {
            let id = $(elem).attr('id').split('-')[1]

            $(elem).toggleClass('text-warning')

            $('.star').each((i, elem2) => {
                let idTodos = $(elem2).attr('id').split('-')[1]
                if (idTodos < id || idTodos == id) {
                    $(elem2).addClass('text-warning')
                } else {
                    $(elem2).removeClass('text-warning')
                }
            })

            $(elem).on('click', () => {
                $('#evaluation').val(id)
            })

        })
    })

    $('.stars-evaluation').mouseout(() => {

        let hasEval = $('#evaluation').val()
        $('.star').each((i, elem) => {
            if (!hasEval) {

                $(elem).removeClass('text-warning')

            } else {
                let id = $(elem).attr('id').split('-')[1]

                $(elem).toggleClass('text-warning')

                $('.star').each((i, elem2) => {
                    let idTodos = $(elem2).attr('id').split('-')[1]
                    if (idTodos < hasEval || idTodos == hasEval) {
                        $(elem2).addClass('text-warning')
                    } else {
                        $(elem2).removeClass('text-warning')
                    }
                })

                $(elem).on('click', () => {
                    $('#evaluation').val(id)
                })
            }
        })

    })
}
starsEvaluation()


function evaluationIndex() {
    let totalProducts = $('#productsList').attr('totalProducts')

    for (let i = 0; i < totalProducts; i++) {
        let evaluation = $(`#avaliation${i}`).attr('avaliation')
        console.log(evaluation)
        let stars = ''

        evaluationPNumber = 0

        /*evaluation == 'ONE' ? evaluationPNumber = 1 : evaluation == 'TWO' ? evaluationPNumber = 2 : evaluation == 'THREE' ? evaluationPNumber = 3 : evaluation == 'FOUR' ? evaluationPNumber = 4 : evaluationPNumber = 5

        for(let j = 0; j < 5; j++){

            if(evaluationPNumber <= j){
                stars += `
                     <i id="star-1" class="fa fa-star pr-2 star text-secondary" style="font-size: 1.3rem" aria-hidden="true"></i>
                `
            } else {
                stars += `
                    <i id="star-1" class="fa fa-star pr-2 star text-warning" style="font-size: 1.3rem" aria-hidden="true"></i>
                `
            }
        }

        $(`#avaliation${i}`).html(stars)*/
    }
}

/*function textareaEdit(){
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() }); // convert all text areas to rich text editor on that page

        bkLib.onDomLoaded(function() {
             new nicEditor().panelInstance('topic_description');
        }); // convert text area with id area1 to rich text editor.

        bkLib.onDomLoaded(function() {
             new nicEditor({fullPanel : true}).panelInstance('area2');
        }); // convert text area with id area2 to rich text editor with full panel.
}
textareaEdit()*/

//tooltip para os links
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function notifications() {
    //$('#notifications-btn').on('click', ()=>{
    let userId = $('#postAjaxNotifications').val()
    let url = $('#postAjaxNotifications').attr('url')
    let data = {
        user: userId
    }

    $.getJSON(url, function (data) {
        //console.log(data);
        //
        console.log(data)

        //let ar = 

        let notifications = `
                                <p class="text-center">Notificações</p>
           `
        let font1 = 'font-size: 0.9rem'
        let font2 = 'font-size: 0.7rem'
        let newData = data.sort((a, b) => {
            console.log(a.id, b.id)
            if (a.status > b.status) {
                return -1
            }
            if (a.status < b.status) {
                return 1
            }

            return
        })

        console.log(newData)
        for (const i in data) {
            let bgNewNotif = data[i].status == 1 ? 'bg-warning' : ''

            notifications += `
                   <a href="/discussionPage/${data[i].discussionId}" style="text-decoration: none; text-color: #333">
                        <div class="d-flex flex-column notification-container ${bgNewNotif} m-2" style="border-radius: 0.25rem" status="${data[i].status}" notifId="${data[i].id}">
                             <div class="d-flex flex-row">
                                 <p class="px-2 m-0" style="${font1}"><strong>${data[i].name}</strong> fez um post na sua discussão sobre <strong>${data[i].product}</strong> em <strong>${data[i].discussion}</strong></p>
                             </div>
                             <span class="p-1" style="boder: 5px solid #333"></span>
                        </div>
                   </a>
            `
        }

        //data.forEach(notificationObj => {

        // let bgNewNotif = notificationObj.status == 1 ? 'bg-warning' : ''

        // notifications += `
        //        <a href="/discussionPage/${notificationObj.discussionId}" style="text-decoration: none; text-color: #333">
        //             <div class="d-flex flex-column notification-container ${bgNewNotif} m-2" style="border-radius: 0.25rem" status="${notificationObj.status}">
        //                  <div class="d-flex flex-row">
        //                      <p class="px-2 m-0" style="${font1}"><strong>${notificationObj.name}</strong> fez um post na sua discussão sobre <strong>${notificationObj.product}</strong></p>
        //                  </div>
        //                  <span class="p-1" style="boder: 5px solid #333"></span>
        //             </div>
        //        </a>
        // `
        //});
        $('#notifications-container').html(notifications)
    });
    //})
}

function newNotification() {
    let news = 0;

    $('.notification-container').each((i, elem) => {
        let status = $(elem).attr('status')
        news += parseInt(status)

    })

    let quantNotific = ''

    if (news >= 1) {
        quantNotific = ` <span id="notifIcon" class="justify-content-center align-items-center text-light" style="display: flex; width: 16px; height: 16px; background-color: red; border-radius: 50%; font-size: 0.7rem">${news}</span>`
    }

    $('#notification-icons').append(quantNotific)

}

function updateNotifications() {
    $('#notifications-btn').on('click', () => {

        $('#notifIcon').remove()
        ////////////////////

        let notifiactions = $('.notification-container')
        let notifData = new Array()

        // Pegando os id das novas notificações vizualizadas
        notifiactions.each((i, notif) => {
            if ($(notif).attr('status') == 1) {
                notifData.push({ id: $(notif).attr('notifId') })
            }
        })

        // console.log(notifData)
        // console.log(JSON.parse(notifData))

        // Configurando o cabesalho da req para receber o valor do csrf-token
        var _token = $('meta[name="_token"]').attr('content');

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': _token

            }

        });

        //Enviando os dados
        ////
        $.ajax({
            url: "/notificationsUpdate",
            type: 'post',
            data: {
                notifIds: notifData
            },

            success: (data) => {
                console.log(data)
            }
        })
    })
}
updateNotifications()

function like() {
    $('.btn-like').each((i, elem) => {
        $(elem).on('click', () => {
            // console.log('teste')
            $(elem).toggleClass('btn-like-clicked')

            let postId = $(elem).attr('postId')

            // Configurando o cabesalho da req para receber o valor do csrf-token
            var _token = $('meta[name="_token"]').attr('content');

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': _token

                }

            });

            $.ajax({
                url: "/discussion/createUpPostLike",
                type: 'post',
                data: {
                    postId: postId
                },

                success: (data) => {
                    let res = JSON.parse(data)
                    $('.likeContSpan').each((i, elem) => {
                        if ($(elem).attr('idPost') == res.postId) {
                            $(elem).html(res.likes)
                        }
                    })
                    console.log(JSON.parse(data))
                }
            })
        })
    })
}

// function loadLikesPosts(){
//     let url = $('#postAjaxNotifications').attr('url')
//     let data = {
//         user: userId
//     }

//     $.getJSON(url, function (data) {
//         //console.log(data);
//         //
//         console.log(data)
//     })
// }

function showlikesUsersNames() {
    $('.likeContSpan').each((i, elem) => {
        $(elem).mouseenter(() => {
            let father = $(elem).parent()
            let brother = father.children()[1]
            let top = $(brother).height() * 1.2
            $(brother).css('top', `-${top}px`)
            $(brother).fadeIn(200).css('display', 'flex')
        })
    })

    $('.likeContSpan').each((i, elem) => {
        $(elem).mouseleave(() => {
            let father = $(elem).parent()
            let brother = father.children()[1]

            $(brother).fadeOut(200)
        })
    })
}

function submitSearch() {
    $('.search-btn').on('click', () => {
        $('#search-form').submit()
    })
}

submitSearch()


function showSubMenu() {
    $('.nav-category-item').each((i, item) => {

        $(item).mouseenter( (e) => {

            // if(e.target != item){
            //     return
            // }

            $('.nav-category-item-more').each((i, elem) => {

                let subMenuIndex = $(elem).attr('index')
                let categoryIndex = $(item).attr('index')
                if (subMenuIndex == categoryIndex) {
                    $(elem).fadeIn(100)
                    console.log(elem)
                }

            })
        })

        $(item).mouseleave(() => {
            console.log('teste')

            $('.nav-category-item-more').each((i, elem) => {

                let subMenuIndex = $(elem).attr('index')
                let categoryIndex = $(item).attr('index')
                if (subMenuIndex == categoryIndex) {
                    $(elem).fadeOut(100)
                    console.log(elem)
                }

            })
        })
    })
}

showSubMenu()

$(document).ready(() => {
    evaluationIndex()
    notifications()
    like()
    showlikesUsersNames()


    setTimeout(() => {
        newNotification()
    }, 1500)
})