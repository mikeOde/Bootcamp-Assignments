$(document).ready(function(){

    $("#search_btn").click(async function(){
        $("#search_results_tb tr").remove();
        var search_keyword = "";
        search_keyword = $("#search_input").val();
        if(search_keyword != ""){
            await findUsersAPI(search_keyword).then(results => {    // Gets all users that match the search keyword
               // console.log(results);
                $.each(results, function(index, result){
                    var $tr = $('<tr>').append(
                        $('<td>').text(result.full_name),
                        $('<td>').text(result.email).addClass("text-center"),
                        $('<td>').text(result.birthday).addClass("text-center"),
                        $('<td>').text(result.country).addClass("text-center"),
                        $('<td>').text(result.city).addClass("text-center"),
                        $('<td>').text(result.street).addClass("text-center"),
                        $('<td>').append("<button type='button' id='addBtn_" + result.id + "' class='btn btn-info addBtn'>Add Friend</button>").addClass("text-center"),
                        $('<td>').append("<button type='button' id='blockBtn_" + result.id + "' class='btn btn-danger blockBtn'>Block</button>").addClass("text-center")
                    ).appendTo("#search_results_tb");
                })
            })
        }  
        $(".addBtn").click(async function(){                            //adds an event listener to the add friend button
            var id_to_add = $(this).attr("id").substr($(this).attr("id").indexOf("_") + 1);   // targets the id of the user to add as a friend
            //console.log(id_to_add);
            await addFriendsAPI(id_to_add);
            showAddNotification('top', 'center');
        }) 
        $(".blockBtn").click(async function(){                            //adds an event listener to the block button
            var id_to_block = $(this).attr("id").substr($(this).attr("id").indexOf("_") + 1);   // targets the id of the user to block
            // console.log(id_to_block);
            await blockFriendsAPI(id_to_block);
            showBlockNotification('top', 'center');
        }) 
    })

    

    async function findUsersAPI(name) {
        const response = await fetch("http://localhost/facebook/php/search_results.php", {
			method: 'POST',
			body: new URLSearchParams({
				"search_key": name
            })
        })
        if(!response.ok){
            const message = "An Error has occured";
            throw new Error(message);
        }
            
        const search_results = await response.json();
        return search_results;
    }
    
    async function addFriendsAPI(id){
        const response = await fetch("http://localhost/facebook/php/add_friends.php", {
            method: 'POST',
            body: new URLSearchParams({
                "user_id_2": id,
                "is_pending": 1,
                "is_blocked": 0
            })
        });
            
        if(!response.ok){
            const message = "ERROR OCCURED";
            throw new Error(message);
        }
            
        const add_response = await response.json();
        return add_response;
    }

    async function blockFriendsAPI(id){
        const response = await fetch("http://localhost/facebook/php/block_friends.php", {
            method: 'POST',
            body: new URLSearchParams({
                "user_id_2": id,
                "is_pending": 0,
                "is_blocked": 1
            })
        });
            
        if(!response.ok){
            const message = "ERROR OCCURED";
            throw new Error(message);
        }
            
        const block_response = await response.json();
        return block_response;
    }

    function showAddNotification(from, align) {
        color = Math.floor((Math.random() * 4) + 1);
    
        $.notify({
          icon: "tim-icons icon-bell-55",
          message: "Friend request is sent"
    
        }, {
          type: type[color],
          timer: 4000,
          placement: {
            from: from,
            align: align
          }
        })
    }

    function showBlockNotification(from, align) {
        color = Math.floor((Math.random() * 4) + 1);
    
        $.notify({
          icon: "tim-icons icon-bell-55",
          message: "User was blocked successfully"
    
        }, {
          type: type[color],
          timer: 4000,
          placement: {
            from: from,
            align: align
          }
        })
    }
})