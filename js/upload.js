function uploadfile()
{

    var Form = new FormData($('#filesForm')[0]);
    $.ajax({

        url: "import.php",
        type: "POST",
        data : Form,
        processData: false,
        contentType: false,
        success: function(data)
        {
            alert('Rgeisters Succesfully added!');
        }
    });
};
