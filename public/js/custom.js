function stars() {
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
        console.log(hasEval)
    })
}
stars()
console.log('teste')