-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 10:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zeusbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `catgry`
--

CREATE TABLE IF NOT EXISTS `catgry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `catgry`
--

INSERT INTO `catgry` (`id`, `cat_name`) VALUES
(4, 'Photography'),
(5, 'Programming'),
(6, 'Mathematics'),
(7, 'Database'),
(8, 'Travel'),
(9, 'Science'),
(10, 'Games'),
(11, 'Health'),
(12, 'Graphic & Design'),
(13, 'Linux'),
(14, 'Windows'),
(15, 'Mobile'),
(16, 'Movies & TV Programmes'),
(17, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(20000) NOT NULL,
  `time` varchar(20) NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `thread_id`, `user_id`, `comment`, `time`, `likes`, `dislikes`) VALUES
(38, 31, 7, 'I&#039;m not sure what&#039;s going on with the display. But, you also mention that you want to use the flash wirelessly off-camera. For control with Canon&#039;s wireless optical TTL system (and assuming you have the C version of the Neewer flash), you&#039;ll want to have the flash in SLAVE mode.\r\nNote that while Godox â€” of which the Neewer models are a rebranding â€” has a wireless radio system, it&#039;s all-manual, with no TTL, and also not compatible with Canon&#039;s wireless radio system. Your 600D doesn&#039;t have a built-in radio, so that may be moot. You can control it using the pop-up flash as an optical master.\r\nThere&#039;s a different Godox line, the TT685C, which also isn&#039;t Canon-radio compatible but which does support TTL. That doesn&#039;t help you much, now, though.\r\nPersonally, I actually like manual control over TTL for off-camera flash in most cases. The main situation where TTL is really useful is when you set up the flash to point generally at the ceiling â€” on top of a bookshelf or something â€” and use it to provide better light for a birthday party or something. When shooting more formal (even just slightly more formal) portraits, or still life, the TTL system&#039;s guesses about light levels aren&#039;t necessarily correct â€” and that&#039;s even more true when you add more than one flash. ', '2015-10-05 15:10:07', 3, -1),
(39, 30, 7, 'As some have pointed out, it could be that your camera is somehow in E-TTL mode and triggering the strobes through the pre-flash. If so, make sure that your triggers are compatible with the 550D and that they&#039;re making a solid connection. Quite often, triggers can seem like they&#039;re attached properly when, in reality, they&#039;re not seated all the way (or properly mated with mount). \r\nAlso, knowing the model of your radio trigger will help. I&#039;ve heard stories of people buying radio triggers off of eBay that ended up having a really poor flash sync (&gt;= 1/125 shutters even). ', '2015-10-05 15:15:09', 1, 0),
(40, 31, 8, 'If you are using the pop up flash to trigger your lights you will need to press the * button before you take the shot.\r\n(The * button is the flash exposure lock button, if using this button, remember to let your lights recycle before taking the shot, your lights will fire twice. Once when you press the * button and once when you press the shutter release. )', '2015-10-05 15:16:54', 1, -1),
(41, 32, 6, 'I checked in Light room CC 2015.1.1 and you can choose from two options for sorting:\r\n1.	Sort by name\r\n2.	Sort by Kind\r\nIt&#039;s on the Adobe help website as well (https://helpx.adobe.com/lightroom/help/photo-collections.html) which confirms that it sorted the name alphabetically. It doesn&#039;t say anything about by Kind but that also sorted within the same kind by name alphabetically.\r\nSo you can add a prefix to a collection name to sort by date, here are some examples:\r\nâ€¢	yyyy-mm-dd-WalkName e.g. 2015-10-04-SomePlaceName\r\nâ€¢	yyyymmdd-WalkName e.g. 20151004-SomePlaceName\r\nâ€¢	yyyy-mm-dd-7d-WalkName e.g. 2015-10-04-7d-SomePlaceName\r\nâ€¢	yyyy-mm-dd to yyyy-mm-dd WalkName e.g. 2015-10-02 to 2015-10-04 Someplace Name\r\nPutting the date in that order makes it sort chronologically as you want. One example has &#039;7d&#039; which could mean that the collection contains photos over 7 days, you could use other letters for longer periods. I tried adding the start and end date which works fine if you don&#039;t mind a longer name.\r\nExtra details:\r\nFor those that don&#039;t know, a Light room catalog is actually an SQLite database. I was curious about how long you could make a collection name. I checked online and I couldn&#039;t find any evidence about limits. I checked the database and it had no limit set, I think it might be based on the Limits In SQLite. For a quick test I was able to create a collection name with 1000 character which is way more than any sensibly named collection would ever need :). This means you could put as much information into a collection name as you like.\r\n', '2015-10-05 15:18:53', 1, 0),
(42, 33, 6, 'The recharge time is shorter if your batteries are fresh. It is also shorter if you use more expensive ones , like Duracell than cheap no name brands from discount stores, like &quot;Ikea&quot; and &quot;Power cell&quot;. Actually, some devices refuse to run on cheap batteries. \r\nTo improve the charge time further, use 1900-2300mAh rechargeable. They have higher peak amperes and last longer. I recharge once per month, while normal AA batteries go flat after one session. You can get some that keep charged when not used as well. Example figure from http://speedlights.net/wordpress/wp-content/uploads/2010/06/yn460-ii_recycle_times_full_power_in_seconds.jpg\r\nThe fastest recharge I&#039;ve ever done was when I rigged a flash to run off a car battery. It is not that portable, but for outdoor tripod work it is useful. You can also rig it to run from a PSU if you are near a power socket.\r\nYou also gain recycle speed as you lower the power output, at a very good exchange rate. Two flashes of half power is the same light output but the recharge time for two half power flashes is faster than one full power. In my distant past testing, I lowered the recharge time to 25% as the power output was 50%. ', '2015-10-05 15:23:54', 0, -1),
(44, 34, 8, 'I was having the exact same problem but wasn&#039;t able to get it working, even after doing a ton of research. I think I have your solution if you&#039;re having the same problem that I did; the flash will not fire if you have the LCD screen active, the pulse is not emitted to the flash to trigger it unless it is being viewed through the viewfinder.\r\nHope that helps!', '2015-10-05 15:30:59', 1, 0),
(45, 34, 7, 'For camera menu control, you need to have a flash that has that feature in it. All of the flashes with that feature have all five of the pins on the foot to correspond to Canon&#039;s five hotshoe contacts so that the flash can electronically communicate with the camera (however, five pins is no guarantee of menu-command capability--e.g., even Canon&#039;s own 580EX cannot do it). A single-pin manual-only flash simply can&#039;t communicate anything other than the sync/fire signal, because it only has the one pin. That&#039;s why they&#039;re so inexpensive--they&#039;re much simpler.\r\nHowever, it should fire correctly, so long as you&#039;re not attempting to do anything other than simple manual flash from the camera (i.e., it can&#039;t do TTL, HSS, 2nd curtain sync, camera menu control, OEM wireless slave mode, etc. etc. etc.) Check that the flash is correctly seated on the hotshoe, and that the batteries in it are all full charged and in good health. Make sure that the flash is out of any slave modes; putting the flash in a slave mode tells it to listen to the slave sensor, not the flash hotshoe.\r\nSee also:\r\nâ€¢	What features should one look for when selecting a flash?\r\nâ€¢	What does an expensive flash unit buy over a cheap one?\r\n', '2015-10-05 15:35:18', 0, 0),
(46, 36, 10, 'If this was a one-time error, just try running SQL*Loader again.\r\n\r\nIf this happens repeatedly, you will need the help of the DBA.\r\n\r\nThe above views barely contain anything informative related to this issue. (Also there is no such view as V$SGA_TARGET or V$PGA_TARGET.) When this error occurs, the database instance creates a trace file on the database server (alert and file location can be found in the alert log), that is what you will need for further investigation\r\n', '2015-10-05 15:42:52', 1, 0),
(47, 40, 9, 'Wait a few minutes if they don&#039;t appear immediately; it took a while for the updates to show up on my iOS device.\r\n\r\n    Step 1: Device Requirements. ...\r\n    Step 2: Use a Windows PC. ...\r\n    Step 3: Download TaiG. ...\r\n    Step 4: Prep Your iPad, iPhone, or iPod Touch. ...\r\n    Step 5: Perform the Jailbreak.', '2015-10-06 00:04:16', 0, 0),
(48, 42, 6, 'awk -F, &#039;\r\n    NR&gt;1{\r\n        sub(&quot;..&quot;,&quot;&quot;)\r\n        d=&quot;&quot;\r\n        for(i=split($2,D,&quot;/&quot;);i&gt;0;i--)\r\n            d=d D[i] &quot; &quot;\r\n        print strftime(&quot;%b %Y&quot;,mktime(d 0&quot; &quot;0&quot; &quot;0)),gensub(&quot;[0-9]&quot;,&quot; &amp; &quot;,8,$1)\r\n    }&#039; file', '2015-10-06 01:49:28', 0, 0),
(49, 45, 6, 'Amos and Andy ran from 1951 - 1953. It is credited as the first black sit-com. It was a spin off of a radio show that started in 1928.\r\n', '2015-10-06 02:19:36', 0, 0),
(50, 47, 8, '\r\n\r\nThe jQuery click event does run before the location changes--but you&#039;re doing something async in the middle of the click handler. The easiest thing to do would be to pass in what you want to have happen into myCustomEvent, roughly:\r\n\r\n$(&#039;external-url&#039;).on(&quot;click&quot;, function (e) {\r\n  var url = this.href;\r\n\r\n  e.preventDefault();\r\n\r\n  myCustomEvent(function() {\r\n    window.location = url;\r\n  });\r\n});\r\n\r\nfunction myCustomEvent(fn) {\r\n  setTimeout(function() {\r\n    console.log(&#039;Execute some custom JS here before a href firing...&#039;);\r\n    fn();\r\n  }, 3000);\r\n}\r\n\r\nThere are other ways to handle this depending on your actual requirements.\r\n', '2015-10-06 02:47:18', 0, -1),
(51, 48, 7, ' This may be a good start =&gt; https://mathiasbynens.be/notes/oninput â€“  lshettyl Mar 13 at 15:43\r\n   	 \r\n	\r\nif you only listen to the change event it should work right? No need for keyup or input â€“  Flame Mar 13 at 15:45\r\n   	 \r\n	\r\nchange typically doesn&#039;t fire from normal key presses. I&#039;m just running a simple console.log(e) in the function to see events, and change doesn&#039;t pop up very often when typing, backspacing, or pasting. â€“  Brandon Mar 13 at 15:49\r\n   	 \r\n	\r\n@LShetty I just tried .oninput and it is suffering the same problem because of jQuery.payment. The input event is not fired on the 4th numbers, so it doesn&#039;t run. â€“  Brandon Mar 13 at 15:54\r\n1 	 \r\n	\r\nAs far as I can see, there&#039;s no other option than to ensure that your anonymous event handler is idempotent (for a given state of the input) - ie, that the same state arises regardless of how many events trigger the handler. â€“  Roamer-1888 Mar 13 at 16:23 ', '2015-10-06 02:50:22', 0, 0),
(52, 48, 7, '\r\n\r\nYou could play around with attaching/detaching event handlers all day and never hit on a successful formula.\r\n\r\nIf your event handler was idempotent (for a given input state), then you wouldn&#039;t need to worry about triggering it twice.\r\n\r\nIf the handler is not naturally idempotent, then you can include a condition which ensures that a second successive call, with the same input value, does nothing. It&#039;s slightly contrived, but this can be regarded as &quot;forced idempotence&quot;.\r\n\r\nTo achieve this, the input element&#039;s &quot;last state&quot; (its value) needs to be stored, read back and tested.\r\n\r\nYou could store the state in some outer/global javascript var but it&#039;s neater to use a &#039;.data()&#039; property of the element itself (which is actually 100% js, not pushed into the DOM).\r\n\r\n$(function() {\r\n    $(&quot;#myInput&quot;).on(&quot;keyup input&quot;, function(e) {\r\n        var $this = $(this),\r\n            $lastState = $this.data(&#039;lastState&#039;) || &#039;&#039;,//read back the element&#039;s previous state (or empty string if this is the first call)\r\n            val = $this.val();//current state\r\n        if(val !== $lastState) {//the all-important test.\r\n            $this.data(&#039;lastState&#039;, val);//store current state to be read back at next call\r\n            //here do whatever is required of your event handler.\r\n        }\r\n    });\r\n});\r\n\r\n', '2015-10-06 02:51:08', 0, 0),
(53, 51, 7, ' 3\r\ndown vote\r\n	\r\n\r\nI use the all-in-one clips from here - http://goo.gl/ldASe\r\n\r\nAfter the first season of use they can become brittle and break, I usually have to replace a few of them every year but they are the best I&#039;ve used.\r\n\r\nThis is my house.\r\n', '2015-10-06 03:01:45', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `last_like_uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `cid`, `last_like_uid`) VALUES
(49, 38, 8),
(50, 39, 8),
(51, 40, 6),
(52, 38, 6),
(53, 41, 8),
(54, 44, 7),
(55, 38, 9),
(56, 40, 9),
(57, 42, 10),
(58, 38, 10),
(59, 46, 8),
(60, 50, 7);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `author` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `last_reply` varchar(50) NOT NULL,
  `views` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `content` varchar(20000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `user_id`, `cat_id`, `title`, `author`, `time`, `last_reply`, `views`, `rate`, `content`) VALUES
(30, 6, 4, 'How to configure Canon EOS 550D for dumb strobe lights?', 'samitha071', '2015-10-05 15:07:33', '7', 5, 0, 'I got a pair of &quot;no name&quot; strobe lights with a simple hot-shoe trigger and trying to use it with EOS 550D. Although it seems to work at first glance (strobes fire when shutter is triggered) in fact they don&#039;t make any difference to the picture. \r\nCamera is set on Manual mode - 1/125 F1.8 ISO 100 - and both with the strobes on and with them turned off the image is exactly the same. \r\nI suspect they fire too early or too late, not when the curtain is open. I have disabled red eye correction but can&#039;t do much else in the Flash control menu - all the menu items are disabled because the hot shoe trigger is not a Canon brand I suppose.\r\nAny ideas or pointers to what could be the problem and how to set up the camera for use with strobes?\r\nThanks!'),
(31, 6, 4, 'I have a Canon 600D and a Newer TT680 flash. Why does it show TTL instead of ETTL on the screen?', 'samitha071', '2015-10-05 15:08:26', '8', 11, 0, 'I want use the Newer off of the cameras body wirelessly.'),
(32, 8, 4, 'How can I organize collections by date in Light room?', 'darshana562', '2015-10-05 15:17:41', '6', 5, 0, 'I often go walking with my camera and I like to collect the photos from each walk into a collection. I name the collection after the place I&#039;ve walked, and it ultimately contains any photos I took, plus anything I might have done with them in Photoshop. Sometimes the walks might span more than one day (or even weeks).\r\nIs there any way for me to date the collections or organize the collections so that each walk is ordered by the date it started. In short I&#039;d like to see a list of all the walks I&#039;ve made with the most recent at the top and the oldest at the bottom.\r\nIs there a better way for me to achieve the same thing?\r\nThe other problem is that if each collection is named after a walk and I complete the same walk twice, this means the name of the collection needs extra information (i.e. a date) to differentiate it. Again this necessity makes me sure I&#039;m not organizing things sensibly.'),
(33, 6, 4, 'Why does my newer external flash take a long time to recharge?', 'samitha071', '2015-10-05 15:23:13', '6', 4, 0, 'I am using a Newer TT520 flash with a Nikon D7000. I am new to flash photography. When I mount it on camera I noticed that at times the flash didn&#039;t fire. I&#039;ve spent some time researching it and discovered that the red light takes long to turn back on after every shot. This wasn&#039;t the case initially (about a month back). Is this issue related to the battery or has it something to do with the camera settings?'),
(34, 8, 4, 'Canon 70D with Newer/Godox TT560 flash not working in hot-shoe', 'darshana562', '2015-10-05 15:29:03', '7', 8, 0, 'This is my first external flash and I&#039;m not sure if I&#039;m missing anything simple. The flash works in slave mode outside of the camera. But when I mount it in the hotshoe mount I can&#039;t get it to fire. The flash is set to M (Master) mode. When I try to change the settings in the menu there is a message about the flash being incompatible or not being on. The menu item is called &quot;External flash fund. Setting&quot; and the message says &quot;This menu cannot be displayed. Incompatible flash or flash&#039;s power is turned off.&quot;'),
(35, 9, 7, '&quot;DB Engine Stolen Server Memory is too high&quot; How to solve this error?', 'anjelo077', '2015-10-05 15:38:51', 'null', 6, 0, 'SQL DB 2012 Engine Stolen Server Memory is too high.\r\nI run query and get this counters:\r\n\r\nStolen Server Memory (KB) 7354.773437\r\n\r\nLock Memory (KB) 106.195312\r\n\r\nFree Memory (KB) 64.632812\r\n\r\nConnection Memory (KB) 24.203125\r\n\r\nLog Pool Memory (KB) 14.085937\r\n\r\nOptimizer Memory (KB) 2.351562\r\n\r\nGranted Workspace Memory (KB) 1.296875\r\n\r\nCursor memory usage 0.000000\r\n\r\nCursor memory usage 0.000000\r\n\r\nCursor memory usage 0.000000'),
(36, 9, 7, 'SQL*Loader-926, ORA-04031 unable to allocate x bytes of shared memory', 'anjelo077', '2015-10-05 15:40:22', '10', 3, 0, 'A customer received this error while importing serveral files. The import routine (VB.NET) is using SQL*Loader (Release 11.2.0.3.0) via Process on each table separately (64 in total) and is called weekly for many years now. Last week following error was thrown:\r\n\r\nvalue used for ROWS parameter changed from 1024 to 795 (all tables are imported with ROWS=1024, no BINDARRAY parameter specified)\r\n\r\nSQL*Loader-926: OCI error while executing delete/truncate (due to REPLACE/TRUNCATE keyword) for table x ORA-04031: unable to allocate 4160 bytes of shared memory (&quot;shared pool&quot;,&quot;unknown object&quot;,&quot;sga heap(1,0)&quot;,&quot;modification &quot;)\r\nI&#039;d googled the ORA-4031 and determined the current memory informations:\r\n\r\n3,08 GB (shared pool) (select sum(bytes), pool from v$sgastat GROUP BY pool),\r\n922MB free memory (select * from v$sgastat where name = &#039;free memory&#039;;) and\r\n1,18 GB shareable memory (select sum(SHARABLE_MEM) from v$db_object_cache;)\r\nTo resolve the issue several posts pointed out to look at the views v$SGA_TARGET, v$PGA_TARGET, v$SGA_TARGET_ADVICE, v$PGA_TARGET_ADVICE, v$SGA_DYNAMIC_COMPONENTS and so on, but i have no dba privilege. (table or view does not exist).\r\n\r\nThus i&#039;d like to know whether i can resolve the issue only with SQL*Loader settings or must a DBA investigate into this?\r\n\r\nEDIT:\r\ncontrol file: LOAD DATA INFILE &#039;&lt;filepath&gt;&#039; INTO TABLE x TRUNCATE(&lt;columns&gt;)\r\ncall: sqlldr.exe userid=... log=... ctl=... bad=... rows=1024\r\n'),
(37, 10, 7, 'How to create a dummy Linked Server in SQL Server 2012', 'miuranga055', '2015-10-05 15:44:05', 'null', 2, 0, 'I have a database in two different production servers. I want to keep the schemas consistent between the two. One has jobs that call stored procedures that reference a Linked Server. The other does not (and should not) contain those jobs or a Linked Server of the same name as that in the first server, but I want both servers to have those same stored procedures. However, when SQL Server refuses to create the procedures that reference the Linked Server on the server that has no Linked Server set up. I understand why that happens, but I need a workaround that does not involve changing the procedure code (such as to use Dynamic SQL to hide the reference from the compiler).\r\n\r\nI tried creating a Linked Server of the expected name that points to the local server, but SQL Server is smart enough to see that the referenced tables do not exist on that Linked Server. If I create one to a non-existant server, SQL times out during the creation of the procedure saying that it couldn&#039;t connect to the remote server.\r\n\r\nIs there any way to create a dummy Linked Server such that SQL Server will not try to validate the table names on the Linked Server?'),
(38, 9, 7, '\r\n\r\nI have to do a migration where I should retrieve data from 40 Access tables, which should contain several of the same columns (but not all, the schemas are different).', 'angelo077', '2015-10-05 15:54:22', 'null', 3, 0, 'It is part of a migration to SQL Server through SSIS. A portion of the treatment is the same for all the tables but there are some subtleties. One problem is that the column names have slight differences (like X_Y instead of X).\r\n\r\nI hope it is not too broad a question, but:\r\n\r\nIs it better to try to do a generic part, taking the table name as a variable to apply the same treatment with conditions in it to take care of the differences?\r\n\r\nOr should I just copy &amp; paste a core/template data flow and manage each difference in separate packages?\r\n'),
(39, 9, 7, 'Installing SQL 2012', 'angelo077', '2015-10-05 16:26:00', 'null', 0, 0, 'Hello, I want to install SQL server 2012. Please Tell how to install it....'),
(40, 6, 15, 'How to Jailbreak iphone', 'samitha071', '2015-10-06 00:02:27', '9', 4, 0, 'Hello, Please help me to jail break my iphone without computer. I tried several ways but not working.'),
(41, 8, 13, 'Grep causes EXIT trap in bash script', 'darshana562', '2015-10-06 00:13:23', 'null', 1, 0, 'When running the following script in OSX using bash version 3.2\r\n\r\n#!/bin/sh\r\n\r\nset -e\r\nfunction _trap_exit {\r\n   echo &quot;this is a triggered trap...&quot;\r\n}\r\n\r\ntrap _trap_exit EXIT\r\n\r\n/usr/sbin/ioreg -w0 -l | grep ExternalChargeCapable | grep -q No\r\n\r\necho &quot;Final statement&quot;\r\nI get a trap triggered. But if I change the final grep statement to Yes ie grep -q Yes then the trap isn&#039;t triggered.\r\n\r\nAny idea why this is happening and how to stop it? Why should the exit code from grep cause a trap to be triggered?\r\n'),
(42, 8, 13, 'Help with awk / sed shell script', 'darshana562', '2015-10-06 01:46:43', '6', 3, 0, '\r\nI have to make a script using the info in the following table (fake info)\r\n\r\nAnimalNumber,DOB,Gender,Breed,Date-moved-in\r\nIE161289240602,04/02/2010,M,AAX,20/07/2011,\r\nIE141424490333,13/01/2009,M,LMX,21/09/2010,\r\nIE151424420395,19/01/2007,F,LMX,20/08/2010,\r\nbasically I need to list only the DOB and animalnumber but the animal number should be broken up like this\r\n\r\nIE161289240602 should be 1612892 4 0602\r\n\r\nand also only the month and year of birth should be listed so something like this for the first line\r\n\r\nFeb 2010 1412892 4 0602\r\nAny ideas on how to do this ? I am afraid its a bit outside my skill set'),
(43, 6, 8, 'Visiting Yosemite in December', 'samitha071', '2015-10-06 01:55:36', 'null', 4, 0, '\r\nI will spend some time in San Francisco in December and want to take the opportunity to visit the Yosemite National Park over the weekend. However I have read that there might be the need for tire chains in winter time.\r\n\r\nSo I am wondering if hire cars (rented at the San Francisco international airport) are as a standard supplied with tire chains or if I need to request them explicitly? And if they are not standard will there be any extra charges?\r\n\r\nThanks in advance for any answers.'),
(44, 7, 16, 'Help find mistaken identity movie', 'danika896', '2015-10-06 02:04:58', 'null', 0, 0, '\r\nI&#039;m trying to remember the name of a movie where a maid working for rich people tries on homeowners&#039; clothes upstairs, after the owners leave, and right before a robbery downstairs. Something in the safe? The guy that was sent to rob the house was really being set up to cover a murder. No one believes she is the maid, not even the assassin who shows up to kill the burglar... maybe it was insurance fraud? People get tied up in the basement.\r\n\r\nEDIT- I think she might have used the pool before she went upstairs to try on clothes, but don&#039;t remember clearly.\r\n\r\nIt was one of those late-80s-early 90s late night TV movies I think, on whatever network eventually turned into UPN or WB. It was on 3-4 times a week for a month, but I never saw the beginning to know what it was called.\r\n\r\nAmerican movie, in English.\r\n\r\n'),
(45, 7, 16, 'First appearance of a predominately black cast in a TV show', 'danika896', '2015-10-06 02:18:56', '6', 2, 0, 'I was watching Me TV the other day, which is a fantastic station chock-full of old-time TV shows. In one sitting I saw episodes of Superman, Batman, Wonder Woman, The Rifleman and Star Trek (TOS). So it got me thinking... None of these shows has many (if any) black actors. And now I&#039;m curious as to which TV show was the first to feature a predominantly black cast.\r\n\r\nAnyone know? I&#039;m thinking back to What&#039;s Happening, Good Times, The Jeffersons... But were there any before then?'),
(46, 6, 16, 'Why does Sin call Roy as Abercombie?', 'samitha071', '2015-10-06 02:20:53', 'null', 0, 0, 'In the TV show Arrow, why does Sin call Roy as Abercombie? Is it because the red hoodie he wears is of brand Abercrombie &amp; Fitch ? Wikipedia says the actor (Colton Lee Haynes) modelled for the brand, so it is for promotion?'),
(47, 6, 5, 'Make sure jQuery on click runs before a href firing', 'samitha071', '2015-10-06 02:45:40', '8', 3, 0, '\r\n\r\nIs it possible to make sure jQuery on click event executes before the user is forwarded to the external URL? I have been googling now for 2 hours and read a couple of posts here on stackoverflow. I just cant get this to work.\r\n\r\nThis is what I&#039;ve tried:\r\n\r\nHTML:\r\n\r\n&lt;a href=&quot;http://www.example.com/&quot; class=&quot;external-url&quot;&gt;Click me&lt;/a&gt;\r\n\r\nJS:\r\n\r\n$(&#039;.external-url&#039;).on(&quot;click&quot;, function (e) {\r\n  e.preventDefault();\r\n\r\n    if (myCustomEvent()) {\r\n      window.location = this.href;\r\n    }\r\n});\r\n\r\nfunction myCustomEvent()\r\n{\r\n    setTimeout(function() {\r\n        console.log(&#039;Execute some custom JS here before a href firing...&#039;);\r\n        return true;\r\n    }, 3000);\r\n}\r\n\r\nBut it seems like the line &quot;if (myCustomEvent()) {&quot; is exectuted before myCustomEvent function is able to return true. Is there a better way to do this? And a way that actually works?\r\n'),
(48, 8, 5, 'jQuery - How can I make sure a function only runs once with multiple bindings and events firing?', 'darshana562', '2015-10-06 02:48:40', '7', 4, 0, '\r\n\r\nSo I&#039;m working with jQuery.payment on a credit card number text input field. When the user enters any 4th number (4, 8, 12) the plugin automatically puts in a space for a nice look. Because of this, only the keyup event fires, not the input event. However, if the user were to right-click and paste a value in, then only the input event fires. So we have cases where it&#039;s one or the other, or both events firing.\r\n\r\nI have a bound anonymous function for change keyup input to ensure all use-cases are covered, but I want the function to only run once each time the key is pressed, but normal key presses fire both keyup and input. jQuery&#039;s .one() is not an option because this function needs to run more than once, just not twice for one key press. How can I make sure this function only runs once even when both events are fired from one key press?\r\n\r\nI know I could edit jQuery.payment and trigger the input event, but I don&#039;t want to modify vendor plug-ins, in case I decide to change versions or something down the road.\r\n'),
(49, 7, 13, 'Writing a script to automatically run against consecutive variables', 'danika896', '2015-10-06 02:52:39', 'null', 1, 0, 'I was able to create a sed string using patterns but can only run it per mac address. Any suggestions on how to automate the script to run it against consecutive mac addresses? '),
(50, 7, 17, '3 Way Light Switch Issues', 'danika896', '2015-10-06 02:54:55', 'null', 3, 0, '\r\n\r\nI will try to keep this simple. I have two 3 way switches (one in MB-Room and one in D-Room) that control two exterior porch lights that are on the same patio between these two rooms.\r\n\r\nSeveral years ago, the bulb burned out in one of the two fixtures (and i never replaced it) and the 2nd fixture continued to work just fine with both switches, so we just lived with it for a while since we rarely use that patio.\r\n\r\nI just purchased two new light fixtures and replaced the old light fixtures (wired the exact same as the old ones). Both switches now continue to operate that same fixture that always worked - BUT - the fixture that replaced the &quot;burned out&quot; one does not light up at all.\r\n\r\nI replaced both 3 way switches and still only the one light works (both switches seem to work beautifully).\r\n\r\nI consider myself a decent DIY guy, but am looking for some advice on how to track this down (since the wiring in box outlet boxes are VERY hard to access and the traveler wires are behind a stucco wall.\r\n\r\nWould absolutely love it if someone could give me a step by step to troubleshoot all options. Thanks!\r\n'),
(51, 7, 17, 'How should I hang Christmas lights where I don&#039;t have any gutters?', 'danika896', '2015-10-06 03:00:06', '7', 5, 0, 'I finally got around to hanging Christmas lights this year. I bought gutter clips so I wouldn&#039;t have to permanently install anything, but I just realized that I don&#039;t have gutters along a pitched portion of my roof. The soffit there isn&#039;t perforated, so I can&#039;t hang them through it either. I did notice the metal flashing (maybe it&#039;s flashing? someone correct me if I didn&#039;t use the right term) is hung with nails underneath the eaves. Can I nail into that without worrying about moisture problems?'),
(52, 9, 17, 'test', 'angelo077', '2015-10-06 04:19:47', '9', 4, 0, 'sdsds');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(220) NOT NULL,
  `reputation` int(11) NOT NULL,
  `registered_date` varchar(30) NOT NULL,
  `last_login_time` int(11) NOT NULL,
  `last_post_name` varchar(220) NOT NULL,
  `postcount` int(11) NOT NULL,
  `avatar` varchar(220) NOT NULL DEFAULT '/avatar/def.jpg',
  `last_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `email`, `reputation`, `registered_date`, `last_login_time`, `last_post_name`, `postcount`, `avatar`, `last_ip`) VALUES
(6, 'samitha071', 'a3ee936943b2ca8e22222921ceb084ef', 'samitha789@gmail.com', 0, '2015-10-05', 0, '0', 0, 'def.jpg', '127.0.0.1'),
(7, 'danika896', 'a3ee936943b2ca8e22222921ceb084ef', 'danika896@gmail.com', 0, '2015-10-05', 0, '0', 0, 'def.jpg', '127.0.0.1'),
(8, 'darshana562', 'a3ee936943b2ca8e22222921ceb084ef', 'darshana562@hotmail.com', 0, '2015-10-05', 0, '0', 0, 'def.jpg', '127.0.0.1'),
(9, 'angelo077', '202cb962ac59075b964b07152d234b70', 'anjelo077@hotmail.com', 0, '2015-10-05', 0, '0', 0, '0127635001491768822.jpg', '127.0.0.1'),
(10, 'miuranga055', 'a3ee936943b2ca8e22222921ceb084ef', 'miuranga055@gmail.com', 0, '2015-10-05', 0, '0', 0, 'def.jpg', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
