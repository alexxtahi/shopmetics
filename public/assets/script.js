/*------------------
    CountDown
--------------------*/
// For demo preview
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

if (mm == 12) {
    mm = '01';
    yyyy = yyyy + 1;
} else {
    mm = parseInt(mm) + 1;
    mm = String(mm).padStart(2, '0');
}
var timerdate = mm + '/' + dd + '/' + yyyy;
// For demo preview end

console.log(timerdate);


// Use this for real timer date
/* var timerdate = "2020/01/01"; */

$("#countdown").countdown(timerdate, function(event) {
    $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Jours</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
});

function triProdByPrix() {
    //var filter = $('#sorting');
    alert('Filtre par prix');
}

$('#sorting').change(function name(params) {
    alert('Filtre par prix');
});

/**
 * Lancer l'impression des vues pour générer des états
 */
function imprimeEtat() {
    // Lancer l'impression
    window.print();
    window.onafterprint = function() {
        window.close();
    }
}
/**
 * Lancer la modification d'un élément
 */
function launchEdit(lib_cat) {
    // Indexation des balises
    var editForm = document.getElementById('edit-form');
    var oldLibCat = document.getElementById('old_lib_cat');
    var newLibCat = document.getElementById('new_lib_cat');
    var validateBtn = document.getElementById('validate-btn');
    var eraseBtn = document.getElementById('erase-btn');
    // Modification des propriétés
    newLibCat.disabled = false;
    validateBtn.disabled = false;
    eraseBtn.disabled = false;
    // Remplissage des champs
    oldLibCat.value = lib_cat
    newLibCat.value = lib_cat
    editForm.action = editForm.action.replace('%7Blib_cat%7D', lib_cat);
    // Redirection vers le formulaire
    window.location = window.location.href.replace('#main-content', '') + '#main-content';
}