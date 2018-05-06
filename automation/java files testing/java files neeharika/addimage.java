/*Testing the Manage media functionality for Admin*/
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
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.Keys;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.interactions.HasInputDevices;
import org.openqa.selenium.interactions.Keyboard;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;


public class addimage {

public static void main(String args[]) throws IOException, JXLException, BiffException, FileNotFoundException, InterruptedException{ 
	System.setProperty("webdriver.chrome.driver", "C:/Users/cneeh/eclipse-workspace/Selinium/chromedriver.exe");
	WebDriver driver = new ChromeDriver();
Sheet s;

FileInputStream fi = new FileInputStream("C:/eclipse/image.xls");
Workbook w = Workbook.getWorkbook(fi);
s = w.getSheet(0);
int z=s.getRows();
System.out.println("no of rows:"+z);
driver.get("http://wecharttest.herokuapp.com");
driver.manage().window().maximize();
int row=1;
String username = s.getCell(0, row).getContents();
System.out.println("Username "+username);
driver.findElement(By.name("email")).sendKeys(username);
String password= s.getCell(1, row).getContents();
System.out.println("password "+password);
driver.findElement(By.name("password")).sendKeys(password);
driver.findElement(By.name("")).click();
Thread.sleep(3000);
driver.findElement(By.partialLinkText("Manage Media")).click();
s= w.getSheet(1);
int z1=s.getRows();
System.out.println("Rows"+z1);
int row1=1;
String name=s.getCell(0, row1).getContents();
System.out.println("Name"+name);
driver.findElement(By.id("tag[]")).sendKeys(name);
String type=s.getCell(1,row1).getContents();
Select droplist = new Select(driver.findElement(By.id("type[]")));
//Select droplist = new Select(driver.findElement(By.xpath("(//input[@id='type'])[position()=1]")));

droplist.selectByVisibleText(type);
String link=s.getCell(2, row1).getContents();
System.out.println("Link"+link);
driver.findElement(By.id("link[]")).sendKeys(link);
if(z1>2)
	{
	int temp;
	for(row1=2;row1<z1;row1++) {
		driver.findElement(By.id("addmedia")).click();
		Thread.sleep(2000);
	temp=row1;
	driver.findElement(By.xpath("(//input[@type='tag'])[position()="+temp+"]")).sendKeys(s.getCell(0, row1).getContents());
	String type1= s.getCell(1,row1).getContents();
   Thread.sleep(2000);
   Actions actions = new Actions(driver);
   actions.moveToElement( driver.findElement(By.xpath("//*[@id=\"medialist\"]/div["+temp+"]/div/div[2]")));
   actions.click();
   actions.sendKeys(type1);
   actions.build().perform();
	 
	driver.findElement(By.xpath("(//input[@type='url'])[position()="+temp+"]")).sendKeys(s.getCell(2, row1).getContents());
	}}
//driver.findElement(By.xpath("//*[@id=\"1\"]/td[3]")).click();
//JavascriptExecutor js = (JavascriptExecutor) driver; 
//js.executeScript("window.history.go(-1)");
driver.findElement(By.cssSelector("button[class='btn btn-primary']")).click(); 
Thread.sleep(3000);
driver.findElement(By.xpath("//*[@id=\"media_table_filter\"]/label/input")).sendKeys("audio");
Thread.sleep(2000);
driver.findElement(By.xpath("//*[@id=\"clearsearch\"]")).click(); 
Thread.sleep(1000);
driver.findElement(By.xpath("//*[@id=\"media_table_next\"]")).click();
Thread.sleep(1000);
driver.findElement(By.xpath("//*[@id=\"media_table_last\"]")).click();
Thread.sleep(1000);
//driver.findElement(By.xpath("//*[@id=\"11\"]/td[3]/a")).click();
//driver.findElement(By.xpath("//*[@id=\"navigation_bar\"]/div/div[1]/a/img")).click();

//driver.findElement(By.cssSelector("button[class='btn btn-default-sm']")).click();
Thread.sleep(5000);
//driver.findElement(By.xpath("//*[@id=\"app\"]/div/div[3]/div/div[1]/div/a")).click();
Thread.sleep(2000);
}}
