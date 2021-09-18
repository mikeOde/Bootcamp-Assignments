$(document).ready(getExpenses);
	
	function getExpenses(){
		getExpensesAPI().then(expenses => {
			$.each(expenses, function(index, expense){
				var $tr = $('<tr>').append(
					$('<td>').text(expense.expenses_id).addClass("cell100 column1"),
					$('<td>').text(expense.name).addClass("cell100 column2"),
					$('<td>').text(expense.date).addClass("cell100 column3"),
					$('<td>').text(expense.amount).addClass("cell100 column4"),
					$('<td>').append("<button type='button' id='edit_" + expense.id + "' class='btn btn-info editBtn'>Edit</button>"),
					$('<td>').append("<button type='button' id='delete_" + expense.id + "' class='btn btn-danger deleteBtn'>Delete</button>")
				).addClass("row100 body").appendTo("#expenses_table");
			})
			
			$("#add_expense_btn").click(addExpense);
			$("#add_category_btn").click(addCategoryAPI);
			$(".editBtn").click(openExpensesForm);
			$("#closeEditExpenses").click(closeExpensesForm);
			$("#edit_expense_btn").click(async function() {
			
				var id_toEdit = $(this).attr("id").substr($(this).attr("id").indexOf("_") + 1);
				await updateExpenseAPI(id_toEdit);
				await getExpenses();

			})

			$(".deleteBtn").click(async function() {
				var id_todelete = $(this).attr("id").substr($(this).attr("id").indexOf("_") + 1); // targets only the id number from the id string
				// console.log(id_todelete);
				await deleteExpenseAPI(id_todelete);
				await $(this).closest("tr").hide();
				await getExpenses();
			})
		});
	}

	function openExpensesForm() {
		$("#editExpensesForm").show();
	}

	function closeExpensesForm() {
		$("#editExpensesForm").hide();
	}

	function updateExpense(){
		updateExpenseAPI(id)
	}
	
	function addExpense(){
		addExpenseAPI().then(expense => {
			
			var $tr = $('<tr>').append(
				$('<td>').text(expense.id).addClass("cell100 column1"),
				$('<td>').text(expense.category).addClass("cell100 column2"),
				$('<td>').text(expense.date).addClass("cell100 column3"),
				$('<td>').text(expense.amount).addClass("cell100 column4"),
				$('<td>').append("<button type='button' id='edit_" + expense.id + "' class='btn btn-info editBtn'>Edit</button>"),
				$('<td>').append("<button type='button' id='delete_" + expense.id + "' class='btn btn-danger deleteBtn'>Delete</button>")				
				
			).addClass("row100 body").appendTo("#expenses_table");
			$(".deleteBtn").click(async function() {
				var id_todelete = $(this).attr("id").substr($(this).attr("id").indexOf("_") + 1); // targets only the id number from the id string
				// console.log(id_todelete);
				await deleteExpenseAPI(id_todelete);
				await $(this).closest("tr").hide();
				await getExpenses();
			});
			$("#edit_expense_btn").click(async function() {
				var id_toEdit = $(this).attr("id").substr($(this).attr("id").indexOf("_") + 1);
				await updateExpenseAPI(id_toEdit);
				await getExpenses();

			})
		});
	}
	
	
	async function getExpensesAPI(){
		const response = await fetch("http://localhost/expense_tracker/php/get_expenses.php");  //fetches all the expenses data
		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const expenses = await response.json();
		return expenses;
	}
	
	async function addExpenseAPI(){
		const response = await fetch("http://localhost/expense_tracker/php/add_expense.php", {
			method: 'POST',
			body: new URLSearchParams({
				"category": $("#expense_category_input").val(),
				"date": $("#expense_date_input").val(),
				"amount": $("#expense_amount_input").val(),
			})
		});
		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const expense_response = await response.json();
		return expense_response;
	}

	async function updateExpenseAPI(id){
		const response = await fetch("http://localhost/expense_tracker/php/update_expense.php?id="+id, {
			method: 'POST',
			body: new URLSearchParams({
				"category": $("#expense_category_edit").val(),
				"date": $("#expense_date_edit").val(),
				"amount": $("#expense_amount_edit").val(),
			})
		});
		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const update_result = await response.json();
		return update_result;
	}

	async function addCategoryAPI(){
		const response = await fetch("http://localhost/expense_tracker/php/add_category.php", {
			method: 'POST',
			body: new URLSearchParams({
				"category_name": $("#category_name_input").val()
			})
		});
		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		alert("Categorie was added successfully");
	}
	
	async function deleteExpenseAPI(id){
		const response = await fetch("http://localhost/expense_tracker/php/delete_expense.php?id="+id);
		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const delete_result = await response.json();
		return delete_result;
	}

	