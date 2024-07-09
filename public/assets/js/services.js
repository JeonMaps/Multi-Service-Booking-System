$(document).ready(function () {
    // Get the appointment date input
    var appointmentDate = $("#appointmentDate");

    // Set the minimum and maximum dates
    var today = new Date();
    var tomorrow = new Date(today.getTime() + 24 * 60 * 60 * 1000);
    var minDate = tomorrow.toISOString().slice(0, 10);
    var maxDate = new Date(today.getTime() + 365 * 24 * 60 * 60 * 1000)
        .toISOString()
        .slice(0, 10);
    appointmentDate.attr("min", minDate);
    appointmentDate.attr("max", maxDate);
});

function generateTimeOptions() {
    const appointmentTimeInput = document.getElementById("appointmentTime");
    const businessHoursStart = 8;
    const businessHoursEnd = 17;
    appointmentTimeInput.step = 600;
    let options = '';
    for (let hour = businessHoursStart; hour <= businessHoursEnd; hour++) {
      for (let minute = 0; minute < 60; minute += 10) {
        const formattedHour = hour.toString().padStart(2, '0');
        const formattedMinute = minute.toString().padStart(2, '0');
        const time = `${formattedHour}:${formattedMinute}`;
        options += `<option value="${time}">${time}</option>`;
      }
    }
    appointmentTimeInput.innerHTML = options;
  }
  
  // Trigger the function when the modal is opened
  $('#bookServiceModal').on('shown.bs.modal', function () {
    generateTimeOptions();
  })