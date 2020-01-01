<?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "quiz";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM cquest";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    //set up a count to help track waht record we are up to. 0 = first record
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                    $style = ""; //set style to blank

                    if($count > 0 ){ //if its not the first question, add styling to hide the question
                        $style = " style='display:none;'";
                    }

                    echo "
                        <div class='row question-container' ".$style.">"; // <-- Styling added to this line if it not the first question

                    echo"   <div class='col-md-6 mb-6'>
                                <div class='card shadow border-0 h-100'>

                                    <div class='card-body'>

                                        <h5 class='dark-text'>".$row['question']."</h5>
                                        <div class='bg-light'>
                                            <code class='dark-text'>".$row['ccode']."</code>
                                        </div>
                                        <div class='custom-control custom-radio'>
                                            <input type='radio' class='custom-control-input' id='defaultGroupExample1'  name='ans' value='a' checked>
                                            <label class='custom-control-label' for=defaultGroupExample1>".$row["opt1"]."</label></br>
                                        </div>
                                        <div class='custom-control custom-radio'>
                                            <input type='radio' class='custom-control-input' id='defaultGroupExample2'  name='ans' value='b'>
                                            <label class='custom-control-label' for=defaultGroupExample2>".$row["opt2"]."</label></br>
                                        </div>
                                        <div class='custom-control custom-radio'>
                                            <input type='radio' class='custom-control-input' id='defaultGroupExample3'  name='ans' value='c'>
                                            <label class='custom-control-label' for=defaultGroupExample3>".$row["opt3"]."</label></br>
                                        </div>
                                        <div class='custom-control custom-radio'>
                                            <input  type='radio' class='custom-control-input' id='defaultGroupExample4' name='ans' value='d'>
                                            <label class='custom-control-label' for=defaultGroupExample4>".$row["opt4"]."</label></br>
                                        </div>
                                        <button name='submit' class='next'>NEXT</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        ";
                    $count++; //increment the counter

                }// End While

                } else {
                    echo "Currently Unavailable";
                }

                $conn->close();

            ?>
            <!-- include jQuery -->
            <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous"></script>


            <script>
            //Set event handler for next buttons
            $(".next").on("click",function(){
                hide_current_question($(this)); //hide current question
                show_next_question($(this)); //show the next question
            });

            function hide_current_question(element){
                //find the parent with class of 'question-container' and hide it;
                element.closest(".question-container").hide();
            }

            function show_next_question(element){
                //find the parent with class of 'question-container' and then show the next element with class of 'question-container'
                element.closest(".question-container").next(".question-container").show();
            }

            function show_previous_question(element){
                //find the parent with class of 'question-container' and then show the previous element with class of 'question-container'
                element.closest(".question-container").previous(".question-container").show();
            }
            </script>
            <!-- END -->
