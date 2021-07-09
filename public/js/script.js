function changeLang(language, el) {
	var container = document.querySelector('.chooseLang').classList;
	el = el.classList;

	if (container.contains('open')) {
		container.remove('open');
		if (!el.contains('chosen')) {

			document.querySelector('.chooseLang .chosen').classList.remove('chosen');
			el.add('chosen');

		}

		    let lang='ARM';

        if(el[1]=='en-lang')
           lang='ENG';
        alert(lang)
       $.ajax({
            url:'set_lang.php',
            type:'post',
            data:{lang:lang},
            success:function(d){
            	
            	 location.reload();
            }



       })
		return;
	}

	container.add('open');

}