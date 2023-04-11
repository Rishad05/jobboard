$(document).ready(function () {
    //Preview image
    $("#uploadImage").change((e) => {
        console.log("e", e, URL.createObjectURL(e.target.files[0]));
        $("#previewImage").attr("src", URL.createObjectURL(e.target.files[0]));
    });

    //Tab next prev
    const getAllTabButtons = $(".nav-pills .nav-item").length;
    $(".btnNext").click(function () {
        $("#applyForm").addClass("was-validated");

        //Validation Check
        var allValid = true;
        var allValidSelectBox = true;

        // get each input in this tab pane and validate
        $(".tab-pane.show.active")
            .find(".form-control,.custom-select")
            .each(function (i, e) {
                if ($(e).attr("required")) {
                    //Condition for selectbox
                    if ($(e).hasClass("custom-select")) {
                        const selectLength = $(e)
                            .find("option:selected")
                            .val().length;
                        if (selectLength > 0) {
                            allValidSelectBox = true;
                        } else {
                            allValidSelectBox = false;
                        }
                    } else {
                        const inputLength = $(e).val().length;
                        if (inputLength > 0) {
                            allValid = true;
                        } else {
                            allValid = false;
                        }
                    }
                }
            });

        if (allValid && allValidSelectBox) {
            $("#applyForm").removeClass("was-validated");

            //Active Tab
            $(".nav-pills .active")
                .parent()
                .next("li")
                .find("button")
                .trigger("click");
            $(".nav-pills .active").addClass("enable_tab_btn");

            //Disable Button
            const getTabIndex = $(".nav-pills .active").attr("tabIndex");
            if (getTabIndex == 1) {
                $(".btnPrevious").attr("disabled", false);
            } else if (getTabIndex == getAllTabButtons - 1) {
                $(".btnNext").attr("disabled", true);
            }
        }
    });

    $(".btnPrevious").click(function () {
        $(".nav-pills .active").parent().prev("li").find("button").trigger("click");

        //Disable Button
        const getTabIndex = $(".nav-pills .active").attr("tabIndex");
        if (getTabIndex == 0) {
            $(".btnPrevious").attr("disabled", true);
        }
    });

    //Disable button on tab button click
    $(".nav-pills .nav-link").each((i, e) => {
        $(e).click(() => {
            const getTabIndex = $(e).attr("tabIndex");
            if (getTabIndex == 0) {
                $(".btnPrevious").attr("disabled", true);
            } else if (getTabIndex == getAllTabButtons - 1) {
                $(".btnNext").attr("disabled", true);
            } else {
                $(".btnPrevious").attr("disabled", false);
                $(".btnNext").attr("disabled", false);
            }
        });
    });

    //Tab add remove functionality
    const addNewRow = (tableBody, htmlCode) => {
        $(tableBody).append(htmlCode);
    };

    let range_arr = JSON.parse(year_range);

    const getAllYear = (show = false) => {
        let allyear = '';
        for (let index = 0; index <= range_arr.length - 1; index++) {
            if (show === true && range_arr[index] == "continue") {
                allyear += `<option value="${range_arr[index]}">${range_arr[index]}</option>`;
            } else {
                if (range_arr[index] != "continue") {
                    allyear += `<option value="${range_arr[index]}">${range_arr[index]}</option>`;
                }
            }

        }

        return allyear;
    }


    //Academic tab add remove functionality
    const academicHtml = `<tr class="vertical-center">
    <td>
        <div class="table_input_area">
            <select required class="custom-select" name="education_lavel[]" id="education_lavel">
                <option selected disabled value="">
                    Choose...
                </option>
                <option value="ssc">SSC</option>
                <option value="hsc">HSC</option>
                <option value="under graduate">Under Graduate</option>
                <option value="graduate">Graduate</option>
            </select>
            <div class="invalid-feedback">
                Please select Education Level.
            </div>
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <select required class="custom-select" name="degree[]" id="genderSelect">
                <option selected disabled value="">
                    Choose...
                </option>
                <option value="Secondary School Certificate">Secondary School Certificate</option>
                <option value=" Higher Secondary School Certificate"> Higher Secondary School Certificate</option>
                <option value="Bechelor"> Bechelor</option>
                <option value="Masters">Masters</option>
            </select>
            <div class="invalid-feedback">
                Please select Degree.
            </div>
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <select required class="custom-select" name="passing_year[]" id="
            passing_year">
                <option selected disabled value="">
                    Choose...
                </option>${getAllYear()}
                
            </select>
            <div class="invalid-feedback">
                Please select Board .
            </div>
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <select class="custom-select" name="board[]" id="board">
                <option selected disabled value="">
                    Choose...
                </option>
                <option value="Barisal">Barisal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Jessore">Jessore</option>
                <option value="Mymensingh">Mymensingh</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Dinajpur">Dinajpur</option>
                <option value="Others">Others</option>
            </select>
            <div class="invalid-feedback">
                Please select Board .
            </div>
        </div>
    </td>
    <td>
    <div class="table_input_area">
    <input required type="text" class="form-control" name="name_of_institution[]" placeholder="institution name" />
    <div class="invalid-feedback">
        Please Enter Institution name.
    </div>
</div>
    </td>
    <td>
        <div class="table_input_area">
            <select required class="custom-select" name="major[]" id="major">
                <option selected disabled value="">
                    Choose...
                </option>
                <option value="Science">Science</option>
                <option value="Commerce">Commerce</option>
                <option value="Arts">Arts</option>
                <option value="Others">Others</option>
            </select>
            <div class="invalid-feedback">
                Please select Concentration.
            </div>
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <input required type="text" class="form-control" name="result[]" placeholder="Result" />
            <div class="invalid-feedback">
                Please Enter result.
            </div>
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <input required type="text" class="form-control" name="result_out_of[]" placeholder="Result" />
            <div class="invalid-feedback">
                Please Enter result.
            </div>
        </div>
    </td>
    <td>
        <button type="button" class="delete_icon" id="academicRemove">
            <i class="fa-regular fa-trash-can"></i>
        </button>
    </td>
</tr>`;
    $("#academicAdd").click(function () {
        addNewRow("#academicTable tbody", academicHtml);
    });

    $("#academicTable").on("click", "#academicRemove", function () {
        $(this).parents("tr").remove();
    });

    //Employment tab add remove functionality
    const employmentHtml = `<tr class="vertical-center">
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="organization_name[]" placeholder="Organization's Name" />
          <div class="invalid-feedback">
              Please Enter Organization's Name.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="address[]" placeholder="Address" />
          <div class="invalid-feedback">
              Please Enter Address.
          </div>
      </div>
  </td>

  <td>
      <div class="table_input_area">
          <select class="custom-select" name="industry_type[]" id="industryType">
              <option>
                  Choose...
              </option>
              <option value="IT">IT</option>
              <option value="Group of company">Group of company</option>
              <option value="Garments">Garments</option>
              
          </select>
          <div class="invalid-feedback">
              Please select Industry Type.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="department[]" id="department">
              <option>
                  Choose...
              </option>
              <option value="Department 1">Department 1</option>
              <option value="Department 2">Department 2</option>
              <option value="Department 3">Department 3</option>
          </select>
          <div class="invalid-feedback">
              Please select Department.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="designation[]" placeholder="Designation " />
          <div class="invalid-feedback">
              Please Enter Designation .
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="key_responsibility[]" placeholder="Key Responsibilities" />
          <div class="invalid-feedback">
              Please Enter Key Responsibilities .
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="start_from[]" id="genderSelect">
              <option>
                  Choose...
              </option>
              ${getAllYear()}

          </select>
          <div class="invalid-feedback">
              Please select From .
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="end_to[]" id="genderSelect">
              <option>
                  Choose...
              </option>
              ${getAllYear(true)}
          </select>
          <div class="invalid-feedback">
              Please select To .
          </div>
      </div>
  </td>

  <td>
      <button type="button" class="delete_icon" id="employmentRemove">
          <i class="fa-regular fa-trash-can"></i>
      </button>
  </td>
</tr>`;
    $("#employmentAdd").click(function () {
        addNewRow("#employmentTable tbody", employmentHtml);
    });

    $("#employmentTable").on("click", "#employmentRemove", function () {
        $(this).parents("tr").remove();
    });

    //Training tab add remove functionality
    const trainingHtml = `<tr class="vertical-center">
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="title[]" placeholder="Training title" />
          <div class="invalid-feedback">
              Please Enter Training Information.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="institution_name[]" placeholder="Institution name" />
          <div class="invalid-feedback">
              Please Enter institution name
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="address[]" placeholder="Address" />
          <div class="invalid-feedback">
              Please Enter Address.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="duration[]" placeholder="Duration" />
          <div class="invalid-feedback">
              Please Enter Duration.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="date" name="start_date[]" class="form-control" />
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="date" name="end_date[]" class="form-control" />
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" class="form-control" name="skills[]" placeholder="Skill" />
          <div class="invalid-feedback">
              Please Enter Skill/ Acquired.
          </div>
      </div>
  </td>

  <td>
      <button type="button" class="delete_icon" id="trainingRemove">
          <i class="fa-regular fa-trash-can"></i>
      </button>
  </td>
</tr>`;
    $("#trainingAdd").click(function () {
        addNewRow("#trainingTable tbody", trainingHtml);
    });

    $("#trainingTable").on("click", "#trainingRemove", function () {
        $(this).parents("tr").remove();
    });

    //Professional tab add remove functionality
    const professionalHtml = ` <tr class="vertical-center">
  <td>
      <div class="table_input_area">
          <input required type="text" name="certificate[]" class="form-control" placeholder="Certification" />
          <div class="invalid-feedback">
              Please Enter Certification.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input required type="text" name="awarding_body[]" class="form-control" placeholder="Awarding Body" />
          <div class="invalid-feedback">
              Please Enter Awarding Body.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" name="address[]" class="form-control" placeholder="Address" />
          <div class="invalid-feedback">
              Please Enter Address.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" name="registration_number[]" class="form-control" placeholder="Reg No" />
          <div class="invalid-feedback">
              Please Enter Registration No.
          </div>
      </div>
  </td>

  <td>
      <div class="table_input_area">
          <select class="custom-select" name="passing_year[]" id="passingYear">
              <option>
                  Choose...
              </option>
              ${getAllYear()}

          </select>
          <div class="invalid-feedback">
              Please select Passing Year .
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" name="result[]" class="form-control" placeholder="Result" />
          <div class="invalid-feedback">
              Please Enter Result (If any).
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" name="remarks[]" class="form-control" placeholder="Remarks " />
          <div class="invalid-feedback">
              Please Enter Remarks (If any).
          </div>
      </div>
  </td>

  <td>
      <button type="button" class="delete_icon" id="professionalRemove">
          <i class="fa-regular fa-trash-can"></i>
      </button>
  </td>
</tr>`;
    $("#professionalAdd").click(function () {
        addNewRow("#professionalTable tbody", professionalHtml);
    });

    $("#professionalTable").on("click", "#professionalRemove", function () {
        $(this).parents("tr").remove();
    });

    //Skill tab add remove functionality
    const skillHtml = ` <tr class="vertical-center">
    <td>
        <div class="table_input_area">
            <input type="text" name="key_skill1[]" class="form-control" placeholder="Skill 1" />
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <input type="text" name="key_skill2[]" class="form-control" placeholder="Skill 2" />
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <input type="text" name="key_skill3[]" class="form-control" placeholder="Skill 3" />
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <input type="text" name="key_skill4[]" class="form-control" placeholder="Skill 4" />
        </div>
    </td>

    <td>
        <button type="button" class="delete_icon" id="skillRemove">
            <i class="fa-regular fa-trash-can"></i>
        </button>
    </td>
</tr>`;
    $("#skillAdd").click(function () {
        addNewRow("#skillTable tbody", skillHtml);
    });

    $("#skillTable").on("click", "#skillRemove", function () {
        $(this).parents("tr").remove();
    });

    //Computer tab add remove functionality
    const computerHtml = ` <tr class="vertical-center">
    <td>
        <div class="table_input_area">
            <input type="text" name="computer_skill1[]" class="form-control" placeholder="Skill 1" />
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <input type="text" name="computer_skill2[]" class="form-control" placeholder="Skill 2" />
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <input type="text" name="computer_skill3[]" class="form-control" placeholder="Skill 3" />
        </div>
    </td>
    <td>
        <div class="table_input_area">
            <input type="text" name="computer_skill4[]" class="form-control" placeholder="Skill 4" />
        </div>
    </td>

    <td>
        <button type="button" class="delete_icon" id="computerRemove">
            <i class="fa-regular fa-trash-can"></i>
        </button>
    </td>
</tr>`;
    $("#computerAdd").click(function () {
        addNewRow("#computerTable tbody", computerHtml);
    });

    $("#computerTable").on("click", "#computerRemove", function () {
        $(this).parents("tr").remove();
    });

    //Language  tab add remove functionality
    const languageHtml = `<tr class="vertical-center">
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="language[]" id="language">
              <option>
                  Choose...
              </option>
              <option value="Bangla">Bangla</option>
                  <option value="English">English</option>
                  <option value="Hindi">Hindi </option>
          </select>
          <div class="invalid-feedback">
              Please select Language .
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="speaking[]" id="speaking" required>
              <option>
                  Choose...
              </option>
              <option value="Good">Good</option>
              <option value="Average">Average</option>
              <option value="Excellent">Excellent</option>
          </select>
          <div class="invalid-feedback">
              Please select Speaking.
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="writing[]" id="writing" required>
              <option>
                  Choose...
              </option>
              <option value="Good">Good</option>
              <option value="Average">Average</option>
              <option value="Excellent">Excellent</option>
          </select>
          <div class="invalid-feedback">
              Please select Writing .
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="reading[]" id="reading" required>
              <option>
                  Choose...
              </option>
              <option value="Good">Good</option>
              <option value="Average">Average</option>
              <option value="Excellent">Excellent</option>
          </select>
          <div class="invalid-feedback">
              Please select Reading .
          </div>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="listening[]" id="listening" required>
              <option>
                  Choose...
              </option>
                  <option value="Good">Good</option>
                  <option value="Average">Average</option>
                  <option value="Excellent">Excellent</option>
          </select>
          <div class="invalid-feedback">
              Please select Listening .
          </div>
      </div>
  </td>

  <td>
      <button type="button" class="delete_icon" id="languageRemove">
          <i class="fa-regular fa-trash-can"></i>
      </button>
  </td>
</tr>`;
    $("#languageAdd").click(function () {
        addNewRow("#languageTable tbody", languageHtml);
    });

    $("#languageTable").on("click", "#languageRemove", function () {
        $(this).parents("tr").remove();
    });

    //Additional - Relative  tab add remove functionality
    const relativeHtml = `<tr class="vertical-center">
  <td>
      <div class="table_input_area">
          <input type="text" name="name_relative[]" class="form-control" placeholder="Name of Relative" />
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" name="rel_relationship[]" class="form-control" placeholder="Enter Relationship" />
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" name="rel_designation[]" class="form-control" placeholder="Enter Designation" />
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" name="rel_department[]" class="form-control" placeholder="Enter Department" />
      </div>
  </td>
  <td>
      <div class="table_input_area">
          
          <select class="custom-select" name="rel_job_location[]" id="rel_job_location">
              <option>Choose...</option>
                  <option value="Dhaka">Dhaka</option> 
                  <option value="Noakhali">Noakhali</option> 
                   
          </select>
      </div>
  </td>

  <td>
      <button type="button" class="delete_icon" id="relativeRemove">
          <i class="fa-regular fa-trash-can"></i>
      </button>
  </td>
</tr>`;
    $("#relativeAdd").click(function () {
        addNewRow("#relativeTable tbody", relativeHtml);
    });

    $("#relativeTable").on("click", "#relativeRemove", function () {
        $(this).parents("tr").remove();
    });

    //Additional - Interviewed  tab add remove functionality
    const interviewedHtml = `<tr class="vertical-center">
  <td>
      <div class="table_input_area">
          <input type="text" name="previous_position[]" class="form-control" placeholder="Position/ Designation" />
      </div>
  </td>

  <td>
      <div class="table_input_area">
          <select class="custom-select" name="interview_month[]" id="interview_month">
              <option>Choose...</option>
                  <option value="January">January</option>
                  <option value="February">February</option>
                  <option value="March">March</option>
                  <option value="April">April</option>
                  <option value="May">May</option>
                  <option value="June">June</option>
                  <option value="July">July</option>
                  <option value="August">August</option>
                  <option value="September">September</option>
                  <option value="October">October</option>
                  <option value="November">November</option>
                  <option value="Decemebr">Decemebr</option>
          </select>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <select class="custom-select" name="interview_year[]" id="interview_year">
              <option>Choose...</option>
              ${getAllYear()}
          </select>
      </div>
  </td>
  <td>
      <div class="table_input_area">
          <input type="text" name="interview_remarks[]" class="form-control" placeholder="Remarks (If any)" />
      </div>
  </td>

  <td>
      <button type="button" class="delete_icon" id="interviewedRemove">
          <i class="fa-regular fa-trash-can"></i>
      </button>
  </td>
</tr>`;
    $("#interviewedAdd").click(function () {
        addNewRow("#interviewedTable tbody", interviewedHtml);
    });

    $("#interviewedTable").on("click", "#interviewedRemove", function () {
        $(this).parents("tr").remove();
    });

    //Select box value
    function hideShowDiv(selectID, toggleID, valueCheck = "Yes") {
        console.log('ok');
        const getValue = $(`${selectID} :selected`).val();
        if (getValue == valueCheck) {
            console.log('ok');
            $(toggleID).css("display", "block");
        } else {
            $(toggleID).css("display", "none");
        }
    }

    //Job Select
    $("#JobLocation").change(function () {
        hideShowDiv("#JobLocation", "#JobLocationDepended");
    });

    //How Know Select
    $("#howKnow").change(function () {

        hideShowDiv("#howKnow", "#howKnowDepended", "Others");
    });

    //Relative Select
    $("#relativeSelect").change(function () {

        hideShowDiv("#relativeSelect", "#relativeDepended");
    });

    //Previous Select
    $("#previousInterview").change(function () {
        console.log('ok');
        hideShowDiv("#previousInterview", "#previousDepended");
    });
});

// Form Validation Methods Using Bootstrap 4
(function () {
    "use strict";
    window.addEventListener(
        "load",
        function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener(
                    "submit",
                    function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        },
        false
    );
})();
