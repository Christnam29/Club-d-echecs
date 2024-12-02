{
    function OtherOption(selectElement) {
        var autre_profession = document.getElementById('autre_profession');
        if (selectElement.value == 'Autre') {
            autre_profession.style.display='block';
        }
        else {
            autre_profession.style.display= 'none';
        }
    }
document.getElementById('profession').addEventListener('change', function(){
    OtherOption(this);
});

//redirection au bouton submit
    document.getElementById('Myform').addEventListener('submit', function(event){
        event.preventDefault(); //annule l'action par défaut du bouton submit
        
        var textaera= document.getElementById('motivations').value;
        sessionStorage.setItem('motivations', textaera); //Stocker la valeur dans le sessionStorage parce que sinon on ne peut pas executer la condition if dans loading/html
        var formData = new FormData(this);

        console.log("Envoi des données du formulaire...");

        for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); // Affiche chaque paire clé-valeur
        };

        //Envoi des données avant la redirection par fetch
        fetch('http://localhost/club_d_echecs/echec_form.php', {
            method: 'POST',
            body: formData
        })
        .then(function(response){
            //return response.text();
            if (response.ok){
                alert('Formulaire soumis');
                window.location.href='loading.html'; 
            }
            else{
                alert('Erreur lors de l\'envoi des données');
            }
        }) 
        /*.then(function(data){ 
            console.log(data);
            if (data.includes("Succès!")){ 
                window.location.href='../Renvoi/Renvoi.html';
            }
            else {
                alert('erreur');
            }*/
            
        .catch(function(error){
            console.error('Erreur :', error);
            alert('Une erreur s\'est produite');
        });   
    });
}
