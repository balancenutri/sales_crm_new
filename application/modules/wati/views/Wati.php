<?php ?>

<?php

$jsonData = json_decode($templatesJsonData);
$jsonTemplateData = $jsonData->messageTemplates;
?>

<body>
    <center>
        <?php
        if (isset($Errordata)) {
            echo "<h2 style='color:red'>" . $Errordata . "</h2>";
        }
        if (isset($invalidNumbers)) {
            print_r("invalid Numbers found: ");

            foreach ($invalidNumbers as $key => $value) {

                echo $value;
                echo " , ";
            }
        }
        if (isset($response)) {
            $jsonDataBroadcast = json_decode($response);


            if ($jsonDataBroadcast->result == true) {
                echo "<h2 style='color:green'> Message Sent!!</h2>";

            } else {
                echo "<h2 style='color:red'>" . $jsonDataBroadcast->errors->invalidCustomParameters[0] . "</h2>";
            }
        }
        ?>
    </center>


    <div
        style="display:flex;justify-content:center;flex-direction:column;align-items:center;margin-top:30px;width:100%;">
        <form style="display:flex;flex-direction:column;width:800px;"
            action="<?php echo site_url('wati/sendMessage'); ?>" method="post">
            Lead Email ID:
            <textarea style="border:none; vertical-align: middle;
  margin: 5px 5px 5px 0;
  padding: 10px;
  width:100%;
  background-color: #fff;
  border: 1px solid #ddd; border-radius:15px;" name="email" id="email" cols="30" rows="10"></textarea><br>
            <select style="border:none; vertical-align: middle;
  margin: 5px 5px 5px 0;
  padding: 10px;
  width:100%;
  background-color: #fff;
  border: 1px solid #ddd; border-radius:15px;" name="template" id="">

                <?php
                foreach ($jsonTemplateData as $key => $value) {
                    echo "<option value='$value->elementName'>";
                    echo $value->elementName;
                    echo "</option>";
                }
                ?>
            </select><br>
            <br>
            <input style=" background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  width:100%;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;border-radius:15px;" type="submit" value="Send Broadcast">
        </form>
    </div>
</body>