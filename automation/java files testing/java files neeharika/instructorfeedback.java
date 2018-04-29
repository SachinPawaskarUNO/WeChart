/*Testing the instructor feedback*/
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
import org. openqa. selenium. chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.interactions.HasInputDevices;
import org.openqa.selenium.interactions.Keyboard;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;


public class instructorfeedback {

public static void main(String args[]) throws IOException, JXLException, BiffException, FileNotFoundException, InterruptedException{ 
	System.setProperty("webdriver.chrome.driver", "C:/Users/cneeh/eclipse-workspace/Selinium/chromedriver.exe");
	WebDriver driver = new ChromeDriver();
Sheet s;

FileInputStream fi = new FileInputStream("C:/eclipse/instructorfeedback.xls");
Workbook w = Workbook.getWorkbook(fi);
s = w.getSheet(0);
int z=s.getRows();
System.out.println("no of rows:"+z);
driver.get("http://wecharttest.herokuapp.com");
int row=1;
String username = s.getCell(0, row).getContents();
System.out.println("Username "+username);
driver.findElement(By.name("email")).sendKeys(username);
String password= s.getCell(1, row).getContents();
System.out.println("password "+password);
driver.findElement(By.name("password")).sendKeys(password);
driver.findElement(By.name("")).click();
//driver.findElement(By.linkText("TEST")).click();
driver.findElement(By.id("expandCollapse")).click();
Thread.sleep(2000);
driver.navigate().refresh();
//new WebDriverWait(driver, 30).until(ExpectedConditions.visibilityOfElementLocated(By.xpath("//*[@id=\"preview\"]")));
driver.findElement(By.xpath("//*[@id=\"preview\"]")).click();
Thread.sleep(1000);
((JavascriptExecutor)driver).executeScript("scroll(0,400)");
s= w.getSheet(1);
int z1=s.getRows();
System.out.println("Rows"+z1);
int row1=1;
String feedback=s.getCell(0, row1).getContents();
System.out.println("Name"+feedback);
//((JavascriptExecutor)driver).executeScript("scroll(0,400)");
WebElement element = driver.findElement(By.id("feedback"));
((JavascriptExecutor) driver).executeScript("arguments[0].scrollIntoView(true);", element);
Thread.sleep(3000);
driver.findElement(By.name("feedback")).sendKeys(feedback);
Thread.sleep(2000);
driver.findElement(By.xpath("//*[@id=\"btn_save_feedback\"]")).click();
JavascriptExecutor jse = (JavascriptExecutor)driver;
jse.executeScript("window.scrollBy(0,-250)", "");
JavascriptExecutor js = (JavascriptExecutor) driver; 
js.executeScript("window.history.go(-1)");
driver.findElement(By.id("expandCollapse")).click();
WebDriverWait wait = new WebDriverWait(driver, 10);
WebElement el = wait.until(ExpectedConditions.visibilityOfElementLocated(By.xpath("//*[@id=\"navigation_bar\"]/div/div[2]/ul[2]/li[2]/a")));
el.click();
driver.findElement(By.linkText("Logout")).click();
}}