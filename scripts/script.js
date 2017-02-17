$(document).ready(function(){

function slideDown(f_zm){
	$('#cityinfo').text(f_zm);
	$("#cityinfo").slideDown( "slow", function() {zm1 = 1; });
}

var zm1 = 0;
$.ajax({
    url: 'dane.xml',
    dataType: 'xml',
    success: function(data){
        // Extract relevant data from XML
		$(".city").click(function() {
		for(i=iloscElementowF;i<=iloscElementow;i++){
			if($(this).attr("data-id") == i){
				$(data).find('cities').each(function(){
					$(data).find('info[id="'+i+'"]').each(function(){
						var zm22 = $(this).find('desc').text();
						if(zm1 == 0){
							slideDown(zm22);
						}
						else{
							$("#cityinfo").slideUp( "slow", function() {
							zm1 = 0;
							slideDown(zm22);
						  });	
						}
					});
				});
				}
			}
		});
			
		
    },
    error: function(data){
        console.log('Error loading XML data');
    }
});

});

