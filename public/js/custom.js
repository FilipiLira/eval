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
$(document).ready(()=>{
    evaluationIndex()
})

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