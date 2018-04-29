/*Testing of adding a new patient with today's date*/
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;
import java.util.concurrent.TimeUnit;

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
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;


public class visitdate {

public static void main(String args[]) throws IOException, JXLException, BiffException, FileNotFoundException, InterruptedException{ 
WebDriver driver = new FirefoxDriver();
Sheet s;

FileInputStream fi = new FileInputStream("C:/eclipse/Visitdate.xls");
Workbook w = Workbook.getWorkbook(fi);
s = w.getSheet(0);
int z=s.getRows();
System.out.println("no of rows:"+z);
driver.get("http://wecharttest.herokuapp.com");
int row=1;
String username = s.getCell(0, row).getContents();
System.out.println("Username "+username);
//driver.get("http://wecharttest.herokupapp.com");
//driver.manage().window().maximize();
driver.findElement(By.name("email")).sendKeys(username);
String password= s.getCell(1, row).getContents();
System.out.println("password "+password);
driver.findElement(By.name("password")).sendKeys(password);
driver.findElement(By.name("")).click();
Thread.sleep(3000);
driver.findElement(By.id("addPatient")).click();
s = w.getSheet(1);
int z1=s.getRows();
System.out.println("no of rows"+z1);
int row1=1;
String sex= s.getCell(0,row1).getContents();
System.out.println("Sex"+sex);
driver.findElement(By.id(sex)).click();
String module=s.getCell(1,row1).getContents();
System.out.println("module"+module);
Select droplist= new Select(driver.findElement(By.className("form-control")));
droplist.selectByVisibleText(module);
String room=s.getCell(2,row1).getContents();
System.out.println("Room number"+room);
driver.findElement(By.id("room_number")).sendKeys(room);
String age=s.getCell(3,row1).getContents();
System.out.println("Age"+age);
driver.findElement(By.id("age")).sendKeys(age);
String todaydate=s.getCell(4,row1).getContents();
System.out.println("date"+todaydate);
((JavascriptExecutor)driver).executeScript ("document.getElementById('visit_date').removeAttribute('readonly',0);");
WebElement Date= driver.findElement(By.id("visit_date"));
Date.sendKeys(todaydate);
driver.findElement(By.cssSelector("button[class='btn btn-primary']")).click();
Thread.sleep(3000);
driver.findElement(By.linkText("Back to Dashboard")).click();
}}
