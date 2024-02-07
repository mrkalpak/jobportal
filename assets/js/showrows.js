document.addEventListener('DOMContentLoaded', function() {
    // Set the default number of rows to display
    changeRowCount(5);

});

function changeRowCount(rows) {
    var table = document.getElementById('myTable');
    var rowCount = table.rows.length;
    document.getElementById("totalText").textContent = (rowCount - 1)
    for (var i = 1; i < rowCount - 1; i++) {
        if (i <= rows) {
            table.rows[i].style.display = '';
        } else {
            table.rows[i].style.display = 'none';
        }
    }

    if (rows <= rowCount - 2) {
        var resultText = document.getElementById("resultText");
        resultText.textContent = ("0" + rows).slice(-2);

    } else {
        var resultText = document.getElementById("resultText");
        resultText.textContent = ("0" + (rowCount - 2)).slice(-2);
    }

}