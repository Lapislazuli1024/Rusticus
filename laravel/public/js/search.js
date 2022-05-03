$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


function livesearch() {
    let data = document.getElementById('livesearch')
    let input = document.getElementById('searchinput')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });

    jQuery.ajax({
        url: "/livesearch",
        method: 'post',
        data: {
            q: jQuery('#searchinput').val().toLowerCase()
        },
        success: function (result) {
            console.log(result);
            result.result.forEach(function (result) {
                if(document.getElementById(result)==null) {
                    let opt = document.createElement('option')
                    opt.innerHTML = result
                    opt.setAttribute('id',result)
                    data.appendChild(opt)
                }
            })
        }
    });
}


