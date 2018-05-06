Feature: Add Patient and Orders

@US4404
Scenario: Add Patient, Orders and Validate Scrollable Panels
Given I am logged in to the application
And I maximize the browser
Then I validate the home page after login
When I click on 'addPatient' button
And I add the following details for the new patient
| Sex  | Module | Room Number | Age | Visit Date |
| Male | ENT    | R101        | 25  | 12/12/1992 |
And I click on 'Orders' link
And I choose 'Medications' as below
| Medications |
| Adoxa       |
| Actonel     |
| Abacavir    |
| Alora       |
And I choose 'Labs' as below
| Labs          |
| Uric Acid     |
| Lipid Profile |
| Pap Smear     |
| Microalbumin  |
And I choose 'Procedure' as below
| Procedure         |
| Laceration Repair |
| Tooth Replacement |
| Eye Exam Basic    |
And I save the Order
Then I should be able to scroll the panels
And I close the browser