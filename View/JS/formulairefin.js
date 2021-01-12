var show_Q2Oui = true;
var show_Q2Non = true;
var text =true;

$('#idfondees').on('click', function(e) {
    e.preventDefault() 
    if (show_Q2Oui) {
        $('#oui').css('display', 'block');
        $('#non').css('display', 'none');
        show_Q2Oui=!show_Q2Oui;
        $('#fondeesEtDetournement').on('click', function(e) {
            $('#ouioui').css('display', 'block');})
    }else{
        $('#oui').css('display', 'none');
        $('#ouioui').css('display', 'none');
        show_Q2Oui=!show_Q2Oui;
    }

})
$('#idPasfondees').on('click', function(e) {
    e.preventDefault() 
    if (show_Q2Non) {
        $('#oui').css('display', 'none');
        $('#ouioui').css('display', 'none');
        $('#non').css('display', 'block');
        show_Q2Non=!show_Q2Non;
    }else{
        $('non').css('display', 'none');
        show_Q2Non=!show_Q2Non;
    }
})


$('#valider').on('click', function(e){ 
    e.preventDefault() 
    var nbr=document.getElementById('nbr').value;
    if (isNaN(nbr)){
        document.getElementById("msg").innerHTML="Tout faux -> retour début";
    }if (nbr==1750){
        document.getElementById("msg").innerHTML="Bravo";
        $.ajax({
            url: 'View/AJAX/fin.php',
            data: {'score' : cpt},
            type: 'post',
            success: function () {
                document.location.href = "localhost/EscapeGame/classement.php"
            }
        })
    }else{
        document.getElementById("msg").innerHTML="Faux -> retour page ou il etait avant";
    }
    
})

