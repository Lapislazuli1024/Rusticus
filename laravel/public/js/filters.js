function filter() {
    let arr = document.querySelectorAll('input[type=checkbox]:checked')
    let contentcard = document.getElementById('card')
    jQuery.ajax({
            url: '/search/filters',
            method: 'post',
            data: {
                filters: document.querySelectorAll('input[type=checkbox]:checked')
            },
            success: function (results) {
                // contentcard.innerHTML='';
                results.forEach(function (result) {
                    console.log(result)
                    /*  let card= document.createElement('div');
                      let cardheader=document.createElement('div');
                      let cardbody=document.createElement('div');
                      let cardcontent=document.createElement('div')
                      card.appendChild(cardheader);
                      cardheader.append(cardbody);
                      card.setAttribute('class','card');
                      cardheader.setAttribute('class','card-header');
                      cardbody.setAttribute('class','card-body');
                      cardheader.innerText=result['name'];
                      cardbody.appendChild()
                      contentcard.appendChild(card);*/
                })
            }
        }
    )
}

function sum() {
    let checked = document.querySelectorAll("input[type=checkbox]:checked")
    console.log(checked.length)
    let submit= document.getElementById('submit');
     submit.setAttribute('value','submit ('+checked.length+')')
}
function all(id){
    document.getElementById()
}
