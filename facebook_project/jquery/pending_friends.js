$(document).ready(function(){
    displayFriendsRequests();
    $(".acceptBtn").click(async function(){                            //adds an event listener to the accept friend button
        var id_to_accept = $(this).attr("id").substr($(this).attr("id").indexOf("_") + 1);   // targets the id of the user to add as a friend
        //console.log(id_to_accept);
        await acceptFriendsAPI(id_to_accept);
        showAcceptNotification('top', 'center');    //IMPORTANT!!! this is not the notification feature that is required, this is only front end feature
    }) 
    $(".blockBtn").click(async function(){                            //adds an event listener to the decline button
        var id_to_block = $(this).attr("id").substr($(this).attr("id").indexOf("_") + 1);   // targets the id of the user to decline
        // console.log(id_to_decline);
        await declineFriendsAPI(id_to_decline);
        showDeclinekNotification('top', 'center');     //IMPORTANT!!! this is not the notification feature that is required, this is only front end feature
    }) 
})

function displayFriendsRequests(){
    
	getFriendsRequests().then(requests_result => {
		$.each(requests_result, function(index, request){
			var $tr = $('<tr>').append(
                $('<td>').text(request.full_name),
                $('<td>').text(request.email).addClass("text-center"),
                $('<td>').text(request.birthday).addClass("text-center"),
                $('<td>').text(request.country).addClass("text-center"),
                $('<td>').text(request.city).addClass("text-center"),
                $('<td>').text(request.street).addClass("text-center"),
                $('<td>').append("<button type='button' id='acceptBtn_" + request.id + "' class='btn btn-info acceptBtn'>Accept</button>").addClass("text-center"),
                $('<td>').append("<button type='button' id='declineBtn_" + request.id + "' class='btn btn-danger declineBtn'>Decline</button>").addClass("text-center")
            ).appendTo("#friends_requests_tb");
		})
    })

}

async function getFriendsRequests(){
    const response = await fetch("http://localhost/facebook/php/get_friends_requests.php");  //fetches all the friends requests
		
	if(!response.ok){
		const message = "ERROR OCCURED";
		throw new Error(message);
	}
		
	const requests = await response.json();
	return requests;
}

async function acceptFriendsAPI(id){
    const response = await fetch("http://localhost/facebook/php/accept_friends.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id_2": id,
            "is_pending": 0,
            "is_blocked": 0
        })
    });
        
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
        
    const accept_response = await response.json();
    return accept_response;
}

async function declineFriendsAPI(id){
    const response = await fetch("http://localhost/facebook/php/decline_friends.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id_2": id,
        })
    });
        
    if(!response.ok){
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
        
    const decline_response = await response.json();
    return decline_response;
}

function showAcceptNotification(from, align) {
    color = Math.floor((Math.random() * 4) + 1);

    $.notify({
      icon: "tim-icons icon-bell-55",
      message: "Friend request is accepted"

    }, {
      type: type[color],
      timer: 4000,
      placement: {
        from: from,
        align: align
      }
    })
}

function showDeclinekNotification(from, align) {
    color = Math.floor((Math.random() * 4) + 1);

    $.notify({
      icon: "tim-icons icon-bell-55",
      message: "Friend request is declined"

    }, {
      type: type[color],
      timer: 4000,
      placement: {
        from: from,
        align: align
      }
    })
}