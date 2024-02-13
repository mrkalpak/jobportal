

$(document).ready(function() {
    let currentLocation="Raheja Woods, Kalyani Nagar, Pune, Maharashtra 411006"
    $('#embedMap').attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyDhSDqFAuLoGHPw8UDYt2VGIvSjU6Ze10w&q='+currentLocation+'');
    $('#banner').prop('required',true);
    $('#upload').attr("name", "admin_jobfair");

});

function mapLocation(){
    $address=$("#location").val();
    // console.log($address=='');
    if($address==''){
        $address="Raheja Woods, Kalyani Nagar, Pune, Maharashtra 411006";
    }else{
        $address;
    }
    $('#embedMap').attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyDhSDqFAuLoGHPw8UDYt2VGIvSjU6Ze10w&q='+$address+'');
}

function editFair($editId){
    console.log($editId);
    $.ajax({
        url: "fetchFairDetails.php",
        type: "get",
        dataType: 'json',
        data: {editId: $editId},
        success: function(response){
            // let responseData = JSON.parse(response);
            let data=JSON.stringify(response);
            var stringify = JSON.parse(data);
            console.log(stringify.fairName);
            $("#Name").val(stringify.fairName)
            $("#organizer").val(stringify.fair_Organizer)
            $("#date").val(stringify.fairDate)
            $("#time").val(stringify.fairTime)
            $("#location").val(stringify.location)
            $('#embedMap').attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyDhSDqFAuLoGHPw8UDYt2VGIvSjU6Ze10w&q='+stringify.location+'');
            $('#currentFile').text('Current File :-'+stringify.fileName)
            $("#updateThisId").val(stringify.id)
            $('#banner').prop('required',false);
            // $('#upload').name('update')
            $('#upload').attr("name", "updateFair");

        }
    });

}

function closeModal(){
    $("#jobFairForm").trigger( 'reset' ); 
    $('#currentFile').text('');
    $('#upload').attr("name", "admin_jobfair");
}


