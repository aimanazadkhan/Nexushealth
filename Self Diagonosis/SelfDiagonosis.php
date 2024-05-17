<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symptom Checker</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .container-fluid {
            max-width: 600px;
            padding: 20px;

        }

        input[type="checkbox"] {
            margin-bottom: 10px;
        }

        .symptom-container {
            width: 30rem;
            align-items: start;

        }

        #logo {

            width: 250px;
            padding: 10px;
        }



        @media (max-width: 576px) {
            .symptom-container {
                width: 25rem;
                margin-left: 20px;

            }
            #logo {
                    margin-left: 20px;
                }
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center container-fluid">
        <div>
            <a href="../Homepage/index.php"><img id="logo" src="../logo/reglogo.png" alt=""
                    style="width: 250px;padding: 10px;"> </a>
            <div class="mt-3 p-3 symptom-container">
                <div class="px-3 py-1 rounded" style="background-color: #F2F6FD">
                    <h4 class="mt-3">Symptom Checker</h4>
                    <p>Select symptoms:</p>
                </div>

                <form class="ms-1 mt-3" id="symptomForm">
                    <div class="border rounded p-2" onclick="toggleCheckbox('fever')">
                        <input type="checkbox" id="feverCheckbox" name="symptom" value="Fever">
                        <label for="feverCheckbox" class="ms-2">Fever</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('cough')">
                        <input type="checkbox" id="coughCheckbox" name="symptom" value="Cough">
                        <label for="coughCheckbox" class="ms-2">Cough</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('headache')">
                        <input type="checkbox" id="headacheCheckbox" name="symptom" value="Headache">
                        <label for="headacheCheckbox" class="ms-2">Headache</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('soreThroat')">
                        <input type="checkbox" id="soreThroatCheckbox" name="symptom" value="Sore throat">
                        <label for="soreThroatCheckbox" class="ms-2">Sore throat</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('fatigue')">
                        <input type="checkbox" id="fatigueCheckbox" name="symptom" value="Fatigue">
                        <label for="fatigueCheckbox" class="ms-2">Fatigue</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('shortnessOfBreath')">
                        <input type="checkbox" id="shortnessOfBreathCheckbox" name="symptom"
                            value="Shortness of breath">
                        <label for="shortnessOfBreathCheckbox" class="ms-2">Shortness of breath</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('chestPain')">
                        <input type="checkbox" id="chestPainCheckbox" name="symptom" value="Chest pain">
                        <label for="chestPainCheckbox" class="ms-2">Chest pain</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('jointPain')">
                        <input type="checkbox" id="jointPainCheckbox" name="symptom" value="Joint pain">
                        <label for="jointPainCheckbox" class="ms-2">Joint pain</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('nausea')">
                        <input type="checkbox" id="nauseaCheckbox" name="symptom" value="Nausea">
                        <label for="nauseaCheckbox" class="ms-2">Nausea</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('vomiting')">
                        <input type="checkbox" id="vomitingCheckbox" name="symptom" value="Vomiting">
                        <label for="vomitingCheckbox" class="ms-2">Vomiting</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('diarrhea')">
                        <input type="checkbox" id="diarrheaCheckbox" name="symptom" value="Diarrhea">
                        <label for="diarrheaCheckbox" class="ms-2">Diarrhea</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('abdominalPain')">
                        <input type="checkbox" id="abdominalPainCheckbox" name="symptom" value="Abdominal pain">
                        <label for="abdominalPainCheckbox" class="ms-2">Abdominal pain</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('rash')">
                        <input type="checkbox" id="rashCheckbox" name="symptom" value="Rash">
                        <label for="rashCheckbox" class="ms-2">Rash</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('dizziness')">
                        <input type="checkbox" id="dizzinessCheckbox" name="symptom" value="Dizziness">
                        <label for="dizzinessCheckbox" class="ms-2">Dizziness</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('difficultySwallowing')">
                        <input type="checkbox" id="difficultySwallowingCheckbox" name="symptom"
                            value="Difficulty swallowing">
                        <label for="difficultySwallowingCheckbox" class="ms-2">Difficulty swallowing</label>
                    </div>

                    <button class="btn btn-primary mt-2" type="button" data-bs-toggle="modal" onclick="checkSymptoms()"
                        data-bs-target="#resultModal">Check</button>
                </form>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resultModalLabel">Symptom Checker Result</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="resultBody">
                            <!-- Result will be displayed here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>

        <script>
            function checkSymptoms() {
                const form = document.getElementById("symptomForm");
                const symptoms = form.querySelectorAll('input[name="symptom"]:checked');
                let result = "<p>Possible diseases:</p>";

                if (symptoms.length === 0) {
                    result += "<p>No symptoms selected</p>";
                } else {
                    // Logic to determine possible diseases based on selected symptoms
                    const diseases = new Set();

                    symptoms.forEach(symptom => {
                        switch (symptom.value) {
                            case "Fever":
                                diseases.add("Infectious Diseases");
                                break;
                            case "Cough":
                                diseases.add("Respiratory Infections");
                                break;
                            case "Headache":
                                diseases.add("Headache Disorders");
                                break;
                            case "Sore throat":
                                diseases.add("Upper Respiratory Tract Infections");
                                break;
                            case "Fatigue":
                                diseases.add("General Fatigue");
                                break;
                            case "Shortness of breath":
                                diseases.add("Respiratory Conditions");
                                break;
                            case "Chest pain":
                                diseases.add("Cardiovascular Diseases");
                                break;
                            case "Joint pain":
                                diseases.add("Arthritis");
                                break;
                            case "Nausea":
                            case "Vomiting":
                            case "Diarrhea":
                            case "Abdominal pain":
                                diseases.add("Gastrointestinal Disorders");
                                break;
                            case "Rash":
                                diseases.add("Skin Conditions");
                                break;
                            case "Dizziness":
                                diseases.add("Dizziness and Vertigo");
                                break;
                            case "Difficulty swallowing":
                                diseases.add("Swallowing Disorders");
                                break;
                            // Add more cases as needed
                        }
                    });

                    if (diseases.size === 0) {
                        result += "<p>No matching diseases found</p>";
                    } else {
                        result += "<ul>";
                        diseases.forEach(disease => {
                            const doctorType = getDoctorType(disease);
                            result += `<li>${disease}: <a href="../Doctor Appointment/doctorList.php?doctor=${doctorType}">You might refer to ${doctorType} Doctor</a></li>`;
                        });
                        result += "</ul>";
                    }
                }

                // Update the modal body with the result
                document.getElementById("resultBody").innerHTML = result;
            }

            function getDoctorType(disease) {
                switch (disease) {
                    case "Infectious Diseases":
                        return "Medicine";
                    case "Respiratory Infections":
                        return "Medicine";
                    case "Headache Disorders":
                        return "Neurology";
                    case "Upper Respiratory Tract Infections":
                        return "ENT";
                    case "General Fatigue":
                        return "Medicine";
                    case "Respiratory Conditions":
                        return "Pulmonology";
                    case "Cardiovascular Diseases":
                        return "Cardiology";
                    case "Arthritis":
                        return "Orthopedics";
                    case "Gastrointestinal Disorders":
                        return "Gastroenterology";
                    case "Skin Conditions":
                        return "Dermatology";
                    case "Dizziness and Vertigo":
                        return "Neurology";
                    case "Swallowing Disorders":
                        return "Otorhinolaryngology (ENT)";
                    default:
                        return "General Medicine";
                }
            }
        </script>
</body>

</html>