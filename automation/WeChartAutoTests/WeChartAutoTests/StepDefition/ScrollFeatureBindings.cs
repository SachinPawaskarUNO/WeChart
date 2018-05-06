using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using TechTalk.SpecFlow;
using NUnit;
using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using WeChartAutoTests.Support;
using NUnit.Framework;
using OpenQA.Selenium.Interactions;
using System.Threading;

namespace WeChartAutoTests.StepDefition
{
    [Binding]
    public sealed class ScrollFeatureBindings
    {
        // For additional details on SpecFlow step definitions see http://go.specflow.org/doc-stepdef
        public IWebDriver driver = new ChromeDriver();


        [Given(@"I am logged in to the application")]
        public void GivenIAmLoggedInToTheApplication()
        {
            driver.Navigate().GoToUrl(WeChartCommonVariables.websiteURL);
            driver.FindElement(By.XPath(WeChartCommonVariables.emailField)).SendKeys(WeChartCommonVariables.userID);
            driver.FindElement(By.XPath(WeChartCommonVariables.passwordField)).SendKeys(WeChartCommonVariables.password);
            driver.FindElement(By.XPath(WeChartCommonVariables.submitButton)).Click();
        }

        [Then(@"I validate the home page after login")]
        public void ThenIValidateTheHomePageAfterLogin()
        {
            bool disabled = true;
            if (driver.FindElement(By.XPath(WeChartCommonVariables.dashboardLanding)).Displayed)
            {
                disabled = false;
            }
            Assert.False(disabled, "Login page not loaded");
        }

        [When(@"I click on '(.*)' button")]
        public void WhenIClickOnButton(string buttonID)
        {
            driver.FindElement(By.Id(buttonID)).Click();
        }

        [When(@"I add the following details for the new patient")]
        public void WhenIAddTheFollowingDetailsForTheNewPatient(Table table)
        {

            string gender = table.Rows[0][0];
            string module = table.Rows[0][1];
            string roomNo = table.Rows[0][2];
            string age = table.Rows[0][3];
            string visitdate = table.Rows[0][4];

            driver.FindElement(By.XPath(WeChartCommonVariables.genderRadio.Replace("gender", gender))).Click();

            SelectElement select = new SelectElement(driver.FindElement(By.XPath(WeChartCommonVariables.moduleSelection)));
            select.SelectByText(module);

            driver.FindElement(By.XPath(WeChartCommonVariables.roomNoField)).SendKeys(roomNo);

            driver.FindElement(By.XPath(WeChartCommonVariables.ageField)).SendKeys(age);

            driver.FindElement(By.XPath(WeChartCommonVariables.visitDateField)).SendKeys(visitdate);

            driver.FindElement(By.XPath(WeChartCommonVariables.submitButton)).Click();
        }

        [When(@"I choose '(.*)' as below")]
        public void WhenIChooseMedicationsAsBelow(string type, Table table)
        {
            IWebElement ele = driver.FindElement(By.XPath(WeChartCommonVariables.setComboList.Replace("type",type)));
            Actions a = new Actions(driver);
            for(int i=0; i<table.Rows.Count; i++)
            {
                a.MoveToElement(ele).Click().Build().Perform();
                Thread.Sleep(500);
                a.SendKeys(table.Rows[i][0]).Build().Perform();
                Thread.Sleep(500);
                driver.FindElement(By.XPath("//li[text()='" + table.Rows[i][0] + "']")).Click();
            }
        }

        [When(@"I click on '(.*)' link")]
        public void WhenIClickOnLink(string linkName)
        {
            IWebElement ele = driver.FindElement(By.LinkText(linkName));
            if (ele.Displayed)
            {
                ele.Click();
            }
            else
            { 
            Actions a = new Actions(driver);
            a.SendKeys(Keys.PageDown).Build().Perform();
            }

        }

        [When(@"I save the Order")]
        public void WhenISaveTheOrder()
        {
            driver.FindElement(By.XPath(WeChartCommonVariables.submitButton)).Click();
        }

        [Then(@"I should be able to scroll the panels")]
        public void ThenIShouldBeAbleToScrollThePanels()
        {

                bool scrollVisible = false;
                if(driver.FindElement(By.XPath(WeChartCommonVariables.scrollBar1)).Displayed && driver.FindElement(By.XPath(WeChartCommonVariables.scrollBar2)).Displayed && driver.FindElement(By.XPath(WeChartCommonVariables.scrollBar3)).Displayed)
                {
                scrollVisible = true;
                }

                if(scrollVisible)
            { 
                IWebElement ele1 = driver.FindElement(By.XPath(WeChartCommonVariables.scrollBar1));
                IWebElement ele2 = driver.FindElement(By.XPath(WeChartCommonVariables.scrollBar2));
                IWebElement ele3 = driver.FindElement(By.XPath(WeChartCommonVariables.scrollBar3));
                Actions a = new Actions(driver);
                a.ClickAndHold(ele1).SendKeys(Keys.PageDown).Release().Perform();
                Thread.Sleep(500);
                a.ClickAndHold(ele2).SendKeys(Keys.PageDown).Release().Perform();
                Thread.Sleep(500);
                a.ClickAndHold(ele3).SendKeys(Keys.PageDown).Release().Perform();
            }
            Assert.True(scrollVisible, "Scrollable panels not found!");

        }

        [Then(@"I close the browser")]
        public void ThenICloseTheBrowser()
        {
            driver.Quit();
        }

        [Given(@"I maximize the browser")]
        public void GivenIMaximizeTheBrowser()
        {
            driver.Manage().Window.Maximize();
        }



    }
}
