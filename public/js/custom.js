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


function evaluationIndex(){
    let totalProducts = $('#productsList').attr('totalProducts')

    for(let i = 0; i < totalProducts; i++){
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

function notifications(){
    //$('#notifications-btn').on('click', ()=>{
        let userId = $('#postAjaxNotifications').val()
        let url = $('#postAjaxNotifications').attr('url')
        let data = {
            user: userId
        }

        $.getJSON(url, function (data) {
           //console.log(data);
           //

           let notifications = `
                                <p class="text-center">Notificações</p>
           `
           let font1 = 'font-size: 0.9rem'
           let font2 = 'font-size: 0.7rem'

           data.forEach(notificationObj => {
    
            notifications += `
                   <a href="/discussionPage/${notificationObj.discussionId}">
                        <div class="d-flex flex-column notification-container" status="${notificationObj.status}">
                             <div class="d-flex flex-row">
                                 <p class="px-2 m-0" style="${font1}"><strong>${notificationObj.name}</strong> fez um post na sua discussão sobre <strong>${notificationObj.product}</strong></p>
                             </div>
                             <span class="p-1" style="boder: 5px solid #333"></span>
                        </div>
                   </a>
            `
           });
           $('#notifications-container').html(notifications)
        });
    //})
}

function newNotification(){
    let news = 0;

    $('.notification-container').each((i, elem)=>{
       let status = $(elem).attr('status') 
       news += parseInt(status)
       
    })
    let quantNotific = ` <span class="justify-content-center align-items-center text-light" style="display: flex; width: 16px; height: 16px; background-color: red; border-radius: 50%; font-size: 0.7rem">${news}</span>`
    
    $('#notification-icons').append(quantNotific)
    
}
$(document).ready(()=>{
    evaluationIndex()
    notifications()
    
    setTimeout(()=>{
        newNotification()
    }, 1500)
})