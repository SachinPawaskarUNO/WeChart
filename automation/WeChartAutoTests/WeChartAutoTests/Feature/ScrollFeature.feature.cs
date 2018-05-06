﻿// ------------------------------------------------------------------------------
//  <auto-generated>
//      This code was generated by SpecFlow (http://www.specflow.org/).
//      SpecFlow Version:2.3.0.0
//      SpecFlow Generator Version:2.3.0.0
// 
//      Changes to this file may cause incorrect behavior and will be lost if
//      the code is regenerated.
//  </auto-generated>
// ------------------------------------------------------------------------------
#region Designer generated code
#pragma warning disable
namespace WeChartAutoTests.Feature
{
    using TechTalk.SpecFlow;
    
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("TechTalk.SpecFlow", "2.3.0.0")]
    [System.Runtime.CompilerServices.CompilerGeneratedAttribute()]
    [NUnit.Framework.TestFixtureAttribute()]
    [NUnit.Framework.DescriptionAttribute("Add Patient and Orders")]
    public partial class AddPatientAndOrdersFeature
    {
        
        private TechTalk.SpecFlow.ITestRunner testRunner;
        
#line 1 "ScrollFeature.feature"
#line hidden
        
        [NUnit.Framework.OneTimeSetUpAttribute()]
        public virtual void FeatureSetup()
        {
            testRunner = TechTalk.SpecFlow.TestRunnerManager.GetTestRunner();
            TechTalk.SpecFlow.FeatureInfo featureInfo = new TechTalk.SpecFlow.FeatureInfo(new System.Globalization.CultureInfo("en-US"), "Add Patient and Orders", null, ProgrammingLanguage.CSharp, ((string[])(null)));
            testRunner.OnFeatureStart(featureInfo);
        }
        
        [NUnit.Framework.OneTimeTearDownAttribute()]
        public virtual void FeatureTearDown()
        {
            testRunner.OnFeatureEnd();
            testRunner = null;
        }
        
        [NUnit.Framework.SetUpAttribute()]
        public virtual void TestInitialize()
        {
        }
        
        [NUnit.Framework.TearDownAttribute()]
        public virtual void ScenarioTearDown()
        {
            testRunner.OnScenarioEnd();
        }
        
        public virtual void ScenarioSetup(TechTalk.SpecFlow.ScenarioInfo scenarioInfo)
        {
            testRunner.OnScenarioStart(scenarioInfo);
        }
        
        public virtual void ScenarioCleanup()
        {
            testRunner.CollectScenarioErrors();
        }
        
        [NUnit.Framework.TestAttribute()]
        [NUnit.Framework.DescriptionAttribute("Add Patient, Orders and Validate Scrollable Panels")]
        [NUnit.Framework.CategoryAttribute("US4404")]
        public virtual void AddPatientOrdersAndValidateScrollablePanels()
        {
            TechTalk.SpecFlow.ScenarioInfo scenarioInfo = new TechTalk.SpecFlow.ScenarioInfo("Add Patient, Orders and Validate Scrollable Panels", new string[] {
                        "US4404"});
#line 4
this.ScenarioSetup(scenarioInfo);
#line 5
testRunner.Given("I am logged in to the application", ((string)(null)), ((TechTalk.SpecFlow.Table)(null)), "Given ");
#line 6
testRunner.And("I maximize the browser", ((string)(null)), ((TechTalk.SpecFlow.Table)(null)), "And ");
#line 7
testRunner.Then("I validate the home page after login", ((string)(null)), ((TechTalk.SpecFlow.Table)(null)), "Then ");
#line 8
testRunner.When("I click on \'addPatient\' button", ((string)(null)), ((TechTalk.SpecFlow.Table)(null)), "When ");
#line hidden
            TechTalk.SpecFlow.Table table1 = new TechTalk.SpecFlow.Table(new string[] {
                        "Sex",
                        "Module",
                        "Room Number",
                        "Age",
                        "Visit Date"});
            table1.AddRow(new string[] {
                        "Male",
                        "ENT",
                        "R101",
                        "25",
                        "12/12/1992"});
#line 9
testRunner.And("I add the following details for the new patient", ((string)(null)), table1, "And ");
#line 12
testRunner.And("I click on \'Orders\' link", ((string)(null)), ((TechTalk.SpecFlow.Table)(null)), "And ");
#line hidden
            TechTalk.SpecFlow.Table table2 = new TechTalk.SpecFlow.Table(new string[] {
                        "Medications"});
            table2.AddRow(new string[] {
                        "Adoxa"});
            table2.AddRow(new string[] {
                        "Actonel"});
            table2.AddRow(new string[] {
                        "Abacavir"});
            table2.AddRow(new string[] {
                        "Alora"});
#line 13
testRunner.And("I choose \'Medications\' as below", ((string)(null)), table2, "And ");
#line hidden
            TechTalk.SpecFlow.Table table3 = new TechTalk.SpecFlow.Table(new string[] {
                        "Labs"});
            table3.AddRow(new string[] {
                        "Uric Acid"});
            table3.AddRow(new string[] {
                        "Lipid Profile"});
            table3.AddRow(new string[] {
                        "Pap Smear"});
            table3.AddRow(new string[] {
                        "Microalbumin"});
#line 19
testRunner.And("I choose \'Labs\' as below", ((string)(null)), table3, "And ");
#line hidden
            TechTalk.SpecFlow.Table table4 = new TechTalk.SpecFlow.Table(new string[] {
                        "Procedure"});
            table4.AddRow(new string[] {
                        "Laceration Repair"});
            table4.AddRow(new string[] {
                        "Tooth Replacement"});
            table4.AddRow(new string[] {
                        "Eye Exam Basic"});
#line 25
testRunner.And("I choose \'Procedure\' as below", ((string)(null)), table4, "And ");
#line 30
testRunner.And("I save the Order", ((string)(null)), ((TechTalk.SpecFlow.Table)(null)), "And ");
#line 31
testRunner.Then("I should be able to scroll the panels", ((string)(null)), ((TechTalk.SpecFlow.Table)(null)), "Then ");
#line 32
testRunner.And("I close the browser", ((string)(null)), ((TechTalk.SpecFlow.Table)(null)), "And ");
#line hidden
            this.ScenarioCleanup();
        }
    }
}
#pragma warning restore
#endregion
