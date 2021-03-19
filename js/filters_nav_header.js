var filterBy = document.getElementById("socio_filterBy");
var activitySelect = document.getElementById("activity_select");
var input = document.getElementById("input_name");

filterBy.addEventListener("change", function()
{
    if(filterBy.value == "activity")
    {
        activitySelect.style.display = "inline-block";
        input.style.display = "none";
    }
    else
    {
        activitySelect.style.display = "none";
        input.style.display = "inline-block";
    }
})