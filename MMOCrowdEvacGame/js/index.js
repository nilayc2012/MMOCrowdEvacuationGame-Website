// This just toggles the follow/following of the button

$('a.follow').click(function (text) {
  $(this).toggleClass('followed');
  
  if($(this).hasClass('followed')) {
    $(this).text('Followed');
  }
  else {

    $(this).text('Follow '+document.getElementById("text").value);
  }
});

$('a.follow1').click(function (text) {
  $(this).toggleClass('followed');
  
  if($(this).hasClass('followed')) {
    $(this).text('Followed');
  }
  else {

    $(this).text('Follow '+document.getElementById("text").value);
  }
});
  
function activateLink()
{
document.getElementById("updatelink").style.visibility="visible";


}  

function deactivateLink()
{
document.getElementById("updatelink").style.visibility="hidden";


}

function activateDropDown()
{
document.getElementById("updatelist").style.visibility="visible";

}

function deactivatedropdown()
{

document.getElementById("updatelist").style.visibility="visible";
}

function activatediv(elem)
{
var elems = ["games", "livegames","following","liveupdate","create","started"]; 


for(var i=0;i<elems.length;i++)
{
	if(elems[i]!=elem)
	{
		
		document.getElementById(elems[i]).style.visibility="hidden";
	}
	else
	{
		document.getElementById(elems[i]).style.visibility="visible";
	}
}
}

function activatedivhome(elem)
{
var elems = ["games", "following","liveupdate","started"]; 


for(var i=0;i<elems.length;i++)
{
	if(elems[i]!=elem)
	{
		
		document.getElementById(elems[i]).style.visibility="hidden";
	}
	else
	{
		document.getElementById(elems[i]).style.visibility="visible";
	}
}
}

$('.carousel').on('slide.bs.carousel',function(e){
    var slideTo = $(e.relatedTarget).index()+1;
    document.getElementById("env-ch").value = slideTo.toString();
});


function removeGame(gameid)
{
	  BootstrapDialog.show({
            title: 'Default Title',
            message: 'Do You Want to remove the Game ?',
            buttons: [{
                label: 'Yes',
                action: function(dialog) {
                    window.location.replace("http://spanky.rutgers.edu/MMOCrowdEvacGame/remove_game.php?gameid="+gameid);
                }
            }, {
                label: 'No',
                action: function(dialog) {
                    dialog.close();
                }
            }]
        });
}

function removeGame1(gameid)
{
	  BootstrapDialog.show({
            title: 'Default Title',
            message: 'Do You Want to remove the Game ?',
            buttons: [{
                label: 'Yes',
                action: function(dialog) {
                    window.location.replace("http://spanky.rutgers.edu/MMOCrowdEvacGame/remove_gamefromprofile.php?gameid="+gameid);
                }
            }, {
                label: 'No',
                action: function(dialog) {
                    dialog.close();
                }
            }]
        });
}

