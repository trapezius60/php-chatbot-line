$.ajax({
  method: "POST",
  url: "AQI.php",  //php page link here
  data: { date: Now()}  // send any data to php page if needed
})
  .done(function( msg ) {   //msg contains the response from php page...
    alert( "Data Saved: " + msg );   //use msg to update the page without refresh
  });
