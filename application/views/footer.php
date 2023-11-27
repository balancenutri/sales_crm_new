</div>
			</div>
		</div>
	</div>
	<!-- end:: Page -->

	<?= $this->load->view('right_sidebar') ?>

	<?= $this->load->view('common_modal_view') ?>

	<?= $this->load->view('js_script') ?>
	<?php //print_r($_SESSION);?>		    
	
	</body>
	<!-- end::Body -->
	
<script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.8.1/firebase-storage.js"></script>
<script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>


<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
//   import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
  
  import { getDatabase } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-database.js";
    
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
   const firebaseConfig = {
    apiKey: "AIzaSyDOPEV-yRs7O6H_o4uhjBTPj9pRqhY4Z-w",
    authDomain: "reminder-popups.firebaseapp.com",
    projectId: "reminder-popups",
    storageBucket: "reminder-popups.appspot.com",
    messagingSenderId: "246951063405",
    appId: "1:246951063405:web:4c86959ce60ab1c05e7464",
    measurementId: "G-1PT32GP6M3",
    databaseURL: "https://reminder-popups-default-rtdb.firebaseio.com/"
  };


  // Initialize Firebase
  const app = firebase.initializeApp(firebaseConfig);
//   const analytics = firebase.getAnalytics(app);
// console.log(app);
  const db = firebase.database();

 

    //  const db = firebase.database();
    firebase.database().ref("reminderpopups").on("child_added", function (snapshot) {
      
        function showNotification(){
            
            const notification = new Notification(snapshot.val().user_name+"("+snapshot.val().type+") is on "+snapshot.val().page_name+" Page from "+snapshot.val().country,{
                body:"Phone:"+snapshot.val().user_phone+"\nProgram :"+snapshot.val().program_name+"("+snapshot.val().session+" sess)\nAmount:"+snapshot.val().amount,
                icon: 'https://www.balancenutrition.in/images/home_page/logo-blue.png'
            });
        }
        
        if(Notification.permission === "granted"){
            //alert('We have permission :: '+ snapshot.val().read_status);
            if(snapshot.val().read_status=='0' && (snapshot.val().admin_id == '<?php echo ($_SESSION['balance_session']['admin_id']);?>' || snapshot.val().admin_id == '0')){
                firebase.database().ref("reminderpopups/"+snapshot.key+"/read_status").set("1");
                showNotification();
            }
        }else if(Notification.permission !== "denied"){
            Notification.requestPermission().then(permission =>{
                console.log(permission);
            })
        }
        
    });
    
</script>
     

</html>