let commentBtns = document.querySelectorAll('.btn-comment')
let modalBody =document.querySelector('.commentaire')
let btnForm =document.querySelector('.btn-form-review')

commentBtns.forEach((btn)=>{
    btn.addEventListener('click', function (e) {
        let idTO = e.target.getAttribute('data-idTour')

        let formData = new FormData()
        formData.append('idTO', idTO)
        fetch('get_review.php',{
            method:'post',
            body:formData
        }).then((response)=>{
            return response.text()
        }).then((data)=>{
            /*console.log(data)*/
            modalBody.innerHTML=data
        })
    })
})



btnForm.addEventListener('click',function (e){
    e.preventDefault()

    let inputMessage = document.querySelector('#input-message')
    let inputAuthor = document.querySelector('#input-name')
    let inputNote = document.querySelector('#input-note')

    let idTO = document.querySelector('.box-review').getAttribute('id')

    let formData = new FormData()
    formData.append('idTO', idTO)
    formData.append('message', inputMessage.value)
    formData.append('author', inputAuthor.value)
    formData.append('note', inputNote.value)



    fetch('add_review.php',{
        method:'post',
        body:formData
    }).then((response)=>{
        return response.text()
    }).then((data)=>{

        modalBody.innerHTML=data
        inputAuthor.value = ''
        inputMessage.value = ''
        inputNote.value = ''
    })

})



