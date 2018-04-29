//Testing the department name in registration page//
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;

import jxl.JXLException;
import jxl.Sheet;
import jxl.Workbook;
import jxl.read.biff.BiffException;

import org.openqa.selenium.*;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.Keys;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.interactions.HasInputDevices;
import org.openqa.selenium.interactions.Keyboard;
import org.openqa.selenium.support.ui.Select;


public class Department {

public static void main(String args[]) throws IOException, JXLException, BiffException, FileNotFoundException, InterruptedException
{ 

	Sheet s;//Initializing a sheet//
    FileInputStream fi = new FileInputStream("C:/eclipse/Register1.xls"); //Inputting the excel workbook//
    Workbook w = Workbook.getWorkbook(fi);
    s = w.getSheet(0); //Getting the required sheet from excel workbook//
    int z=s.getRows();//Getting the number of rows//
    System.out.println("no of rows:"+z);
for(int row=1; row<z; row++) 
{
	//Initializing a new driver to open the web page// 
	WebDriver driver = new FirefoxDriver(); 
	//Getting the home page//
	driver.get("http://wecharttest.herokuapp.com");
	driver.findElement(By.linkText("Register")).click();
	//Getting the elements from excel sheet and inputting them to the elements on the web page//
	//driver.findelement is used for finding elements on the web page to input the values taken from the excel sheet//
String email = s.getCell(0, row).getContents();
System.out.println("Email"+email);
driver.findElement(By.id("email")).sendKeys(email);
String password = s.getCell(1,row).getContents();
System.out.println("Password"+password);
driver.findElement(By.id("password")).sendKeys(password);
String confirmpassword = s.getCell(1,row).getContents();
System.out.println("Confirm password" +confirmpassword);
driver.findElement(By.id("password-confirm")).sendKeys(confirmpassword);
String firstname = s.getCell(3,row).getContents();
System.out.println("First name"+firstname);
driver.findElement(By.id("firstname")).sendKeys(firstname);
String lastname = s.getCell(4,row).getContents();
System.out.println("First name"+lastname);
driver.findElement(By.id("lastname")).sendKeys(lastname);
String contactnum= s.getCell(5,row).getContents();
System.out.println("Contact number"+contactnum);
driver.findElement(By.id("contactno")).sendKeys(contactnum);
String role=s.getCell(11,row).getContents();
System.out.println("role"+role);
driver.findElement(By.id(role)).click();
String department= s.getCell(6,row).getContents();
System.out.println("departmentr"+department);
//This is for selecting a particular value from the dropdown list for department//
Select droplist = new Select(driver.findElement(By.id("departmentName")));   
droplist.selectByVisibleText(department);
//If the department is other than the department name in the dropdown list, it goes to the other column in the excel sheet//
if(department.equals("Other")) {
	String otherDept=s.getCell(7,row).getContents();
	driver.findElement(By.id("newDepartmentName")).sendKeys(otherDept);
}
Select securityquestion1 = new Select(driver.findElement(By.name("security_question1_Id")));
securityquestion1.selectByVisibleText("Your first employer");
String answer1=s.getCell(8,row).getContents();
driver.findElement(By.id("security_answer1")).sendKeys(answer1);
Select securityquestion2 = new Select(driver.findElement(By.name("security_question2_Id")));
securityquestion2.selectByVisibleText("Your mother maiden name");
String answer2=s.getCell(9,row).getContents();
driver.findElement(By.id("security_answer2")).sendKeys(answer2);
Select securityquestion3 = new Select(driver.findElement(By.name("security_question3_Id")));
securityquestion3.selectByVisibleText("Your first car");
String answer3=s.getCell(10,row).getContents();
driver.findElement(By.id("security_answer3")).sendKeys(answer3);
driver.findElement(By.cssSelector("button[class='btn btn-primary']")).click();
}}}