-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 04:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyjob`
--

CREATE TABLE `applyjob` (
  `aid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `resume` longblob NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `about` varchar(500) NOT NULL,
  `jobid` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `jobtitle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applyjob`
--

INSERT INTO `applyjob` (`aid`, `rid`, `resume`, `name`, `gender`, `email`, `phone`, `experience`, `about`, `jobid`, `status`, `jobtitle`) VALUES
(2, 0, 0x766172756e5f726573756d652e706466, 'varun', 'Male', 'varun134657@gmail.com', '6006678296', '1 - 2 years', 'nothing', 2, NULL, NULL),
(3, 0, 0x766172756e5f726573756d652e706466, 'varun', 'Male', 'varun@gmail.com', '6006678296', '1 - 2 years', 'nothing', 2, NULL, NULL),
(4, 2, 0x696e666f7379732e77656270, 'shubham', 'Male', 'shubham@gmail.com', '6006678296', '1 - 2 years', 'nothing motivates me to join', 1, NULL, NULL),
(5, 4, 0x696e666f7379732e77656270, 'Varun Singh', 'Male', 'varun134657@gmail.com', '6006678296', '1 - 2 years', 'I am php developer has done multiple projects in php', 27, NULL, NULL),
(6, 4, 0x696e666f7379732e77656270, 'Shubham Umbarkar', 'Male', 'shubham@gmail.com', '6006678288', '1 - 2 years', 'My name is shubham umbarkar and i am php developer', 27, NULL, NULL),
(7, 3, 0x726573756d65202832292e706466, 'Varun Singh', 'Male', 'Varun123@gmail.com', '6006678297', 'Less than a year', '...................................', 30, 'Rejected', NULL),
(8, 4, 0x43532053797374656d20436f6e74657874204446442e706466, 'Rahul Rajput', 'Male', 'rahul12@gmail.com', '600667829', '1 - 2 years', '...............................................................', 27, NULL, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(6) NOT NULL,
  `title` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `blogimg` longblob NOT NULL,
  `des` varchar(2000) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_img` longblob NOT NULL,
  `a_about` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `title`, `date`, `blogimg`, `des`, `a_name`, `a_img`, `a_about`) VALUES
(1, '7 Ways to Learn HTML and CSS in just 3 months', '2024-01-23', '', 'You want to learn Web Development in 2023 and start making money in 2024. This is the exact roadmap that I used to go from earning $16 an hour to making well beyond $100 as a freelance web developer. I will share the resources and I try to answer all the question you might have right now . Let’s dive into it!\r\nCan I learn web development on my own?\r\nYou can definitely learn web development on your own! I started learning by myself and fell in love with tech. Then, I went back to school and earned my master’s degree in computer science. Now, you might be thinking that not having a CS degree will hold you back, but please don’t doubt yourself. You can become a better developer than people with CS degrees. There are so many examples out there, and I believe you’re on your way to becoming one of them. I believe in you\r\nWhat is the best way to start learning web development?\r\nFollow the structure I’m about to give you and practice consistently. Repetition will be key. Every day, review your notes and the code snippets you learned before, then add a little bit more. Accept that you are not less intelligent just because it is taking time to learn. Remember to keep reminding yourself that others have gone through the same challenges you are facing now. This is what it’s supposed to be.\r\n\r\nIs web development hard for beginners?\r\nNo, it is not hard to learn. I believe web development and Android development are fields you can learn by yourself. You DO NOT have to go to school.', 'Varun Singh', '', 'My name is varun singh and i have 5 years \r\n+ experience of teaching html and css '),
(2, 'this', '2024-01-25', '', '', '', '', ''),
(3, '', '2024-01-25', '', 'In order to make an informed decision about which job you want to take, you need to have a comprehensive understanding of each employers offer. Review your offer letters for details about salary and benefits, and ask the hiring managers about any unclear or missing information. In addition to researching the type of benefits, ask about any probationary period for receiving them. Get your offers in writing and make a list of the different elements of each job offer, including:\r\n\r\nStart date and probation period\r\nSalary\r\nStock options\r\nProfit-sharing\r\nSigning bonus\r\nPerformance bonuses\r\nRetirement accounts\r\nFrequency of raises\r\nHours of work per week\r\nOvertime compensation\r\nVacation time\r\nCompany holidays\r\nPersonal days', 'Shubham Umbarkar', '', ''),
(4, 'What are the ways to select one job between two jobs', '2024-01-25', '', 'In order to make an informed decision about which job you want to take, you need to have a comprehensive understanding of each employers offer. Review your offer letters for details about salary and benefits, and ask the hiring managers about any unclear or missing information. In addition to researching the type of benefits, ask about any probationary period for receiving them. Get your offers in writing and make a list of the different elements of each job offer, including:\r\n\r\nStart date and probation period\r\nSalary\r\nStock options\r\nProfit-sharing\r\nSigning bonus\r\nPerformance bonuses\r\nRetirement accounts\r\nFrequency of raises\r\nHours of work per week\r\nOvertime compensation\r\nVacation time\r\nCompany holidays\r\nPersonal days', 'Arun Khana', '', 'I am arun khana and i can help you to join the best job for your future without any problem');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_signup`
--

CREATE TABLE `candidate_signup` (
  `sno` int(5) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` longblob NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `about` varchar(500) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(20) NOT NULL,
  `degreename` varchar(20) NOT NULL,
  `passingyear` varchar(20) NOT NULL,
  `university` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `linkedin` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate_signup`
--

INSERT INTO `candidate_signup` (`sno`, `fname`, `lname`, `email`, `password`, `photo`, `phone`, `dob`, `about`, `street`, `city`, `state`, `zip`, `degreename`, `passingyear`, `university`, `grade`, `facebook`, `twitter`, `linkedin`, `instagram`) VALUES
(1, 'Varun Singh', '', 'varun134657@gmail.com', '$2y$10$oCQGa4ytNm9PBfZzx7bKgulOUtG7/reXVhBlhJDVAyB4rprHVr2wK', 0x646f776e6c6f6164202831292e706e67, '6006678296', '09-04-2003', 'i am varun and i am php developer', 'Galak', 'Jammu', 'J&k', 114455, 'BCA', '2022', 'Jammu University', 'A++', 'varun@fb.com', '', '', ''),
(2, 'varun', 'singh', 'varun78296@gmail.com', '$2y$10$GvkSHj309fChNRY1T19ZrO7fVJ0l93NDzQQXFKLkjf3GWfCVsgUjK', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(3, '', '', 'rahul@gmail.com', '$2y$10$NTTj0malMYUsqTTP60ZttuZJY9hUIBFlgOn/tBCpmMwm2cJ/g3XzS', 0x776970726f2e6a7067, '6006678296', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(4, 'arun kumar', '', 'arun@gmail.com', '$2y$10$YL2dZ9odz5.YA1UbKVJyOOEQmuwd9v/3i6odK5qALGmmiIyH5GMWC', 0x646f776e6c6f61642e706e67, '6006678296', '09-04-2003', 'my name is arun ', '', '', '', 0, '', '', '', '', '', '', '', ''),
(5, 'shubham', '', 'shubham2@gmail.com', '$2y$10$5CBDLSXbmjTrdQXidJFV5.3K2ePD25/q2ZF2/zH5pgcEDiq6/VX/K', 0x696d6167652e61766966, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(6, 'Rahul Rajput', '', 'rahul12@gmail.com', '$2y$10$y3fMC8.gQfHpQSGZw1xuAODPbuxWytw9KdXCEhK0L399gMkmlGvAS', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `bid` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `name`, `email`, `message`, `date`, `bid`) VALUES
(1, 'varun singh', 'varun134657@gmail.com', 'This is my message', '2024-01-23 15:38:46', 0),
(6, 'varun singh', 'varun134657@gmail.com', 'this is my second message', '2024-01-23 16:00:52', 0),
(8, 'varun singh', 'varun78296@gmail.com', 'learning html and css is easy . one with good programming knowledge can easily learn this within 2months only', '2024-01-23 16:23:55', 0),
(9, 'varun singh', 'varun78296@gmail.com', 'learning html and css is easy . one with good programming knowledge can easily learn this within 2months only', '2024-01-23 16:25:11', 1),
(10, 'Shubham ', 'shubham@gmail.com', 'Html and css are very important languages to learn ', '2024-01-23 16:51:33', 1),
(11, 'varun singh', 'varun78296@gmail.com', 'can we do the two jobs at the same time', '2024-01-25 16:13:12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `sno` int(6) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`sno`, `fname`, `lname`, `email`, `subject`, `message`) VALUES
(1, '', '', '', '', 'this is mesage'),
(2, 'varun', 'singh', 'varun134657@gmail.com', 'this is subject', 'this is desc'),
(3, 'varun', 'singh', 'varun134657@gmail.com', 'how to apply for job', 'this is description'),
(4, 'arun ', 'sharma', 'arun@gmail.com', 'this is my subjectg', 'please help me out to sole this problem'),
(5, 'Rahul ', 'rajput', 'rahul@gmail.com', 'this is my subjectg', 'heloo'),
(6, 'varun', 'singh', 'varun78296@gmail.com', 'this is subject box', 'this is my message box');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `fid` int(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`fid`, `title`, `description`) VALUES
(1, 'what is name of your company', 'can you tell me name of your company'),
(2, 'How i can get job from your job portal website', 'i have visited multiple websites but no one is providing 100% gurantee  for the job so can your website provide meh job and gurantee'),
(3, 'hey how to ask querry  for the job', 'this is rahul khana and i am posting a questions and i am asking you to resolve the problem for ////');

-- --------------------------------------------------------

--
-- Table structure for table `post_job`
--

CREATE TABLE `post_job` (
  `sno` int(6) NOT NULL,
  `rid` int(10) NOT NULL,
  `jobimg` longblob NOT NULL,
  `email` varchar(100) NOT NULL,
  `jobtitle` varchar(60) NOT NULL,
  `sdate` date NOT NULL,
  `ldate` date NOT NULL,
  `joblocation` varchar(50) NOT NULL,
  `jobtype` varchar(50) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `qualification` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `vacancy` varchar(50) NOT NULL,
  `jobdesc` varchar(1000) NOT NULL,
  `jobresp` varchar(1000) NOT NULL,
  `compname` varchar(50) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `compdesc` varchar(1000) NOT NULL,
  `website` varchar(100) NOT NULL,
  `webfb` varchar(100) DEFAULT NULL,
  `webtw` varchar(100) DEFAULT NULL,
  `webld` varchar(100) DEFAULT NULL,
  `logo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_job`
--

INSERT INTO `post_job` (`sno`, `rid`, `jobimg`, `email`, `jobtitle`, `sdate`, `ldate`, `joblocation`, `jobtype`, `gender`, `qualification`, `experience`, `salary`, `vacancy`, `jobdesc`, `jobresp`, `compname`, `tagline`, `compdesc`, `website`, `webfb`, `webtw`, `webld`, `logo`) VALUES
(27, 4, 0x646f776e6c6f61642e6a7067, 'infosys@gmail.com', 'PHP', '2024-02-20', '2024-03-11', 'Delhi', 'Full Time', 'Male', 'UNDER_GRADUATE', '0-1 Year Experience', '50k', '30', 'We are looking for a PHP Developer responsible for managing back-end services and the interchange of data between the server and the users. Your primary focus will be the development of all server-side logic, definition and maintenance of the central database, and ensuring high performance and responsiveness to requests from the front-end. You will also be responsible for integrating the front-end elements built by your co-workers into the application. Therefore, a basic understanding of front-end technologies is necessary as well.', 'Integration of user-facing elements developed by front-end developers\r\nBuild efficient, testable, and reusable PHP modules\r\nSolve complex performance problems and architectural challenges', 'INFOSYS', 'Powered by Intellect, Driven by Values', 'Infosys Limited is an Indian multinational information technology company that provides business consulting, information technology and outsourcing services.', 'www.infosys.com', '', '', '', 0x323031372d30352d3032543133323534345a5f325f4c594e584d50454434313036435f5254524f5054505f335f494e464f5359532d524553554c54532e61766966),
(28, 4, 0x75692075782e706e67, 'infosys@gmail.com', 'UI UX DESIGNER', '2024-04-20', '2024-04-30', 'Mumbai', 'Full Time', 'Any', 'POST-GRADUATE', '1 year experience', '50k', '', 'A UI UX designer is a professional who identifies new opportunities to create better user experiences. Aesthetically pleasing branding strategies help them effectively reach more customers. They also ensure that the end-to-end journey with their products or services meets desired outcomes.', 'Gathering and evaluating user requirements, in collaboration with product managers and engineers\r\nIllustrating design ideas using storyboards, process flows and sitemaps\r\nDesigning graphic user interface elements, like menus, tabs and widgets', 'INFOSYS', 'Powered by Intellect, Driven by Values', '', 'www.infosys.com', '', '', '', 0x323031372d30352d3032543133323534345a5f325f4c594e584d50454434313036435f5254524f5054505f335f494e464f5359532d524553554c54532e61766966),
(29, 4, 0x486972696e672d507974686f6e2d446576656c6f7065722e706e67, 'infosys@gmail.com', 'PYTHON DEVELOPER', '2024-05-10', '2024-05-20', 'Banglore', 'Part Time', 'Any', 'UNDER_GRADUATE', '0-1 Year Experience', '50k', '', 'The roles and responsibilities of Python developers include preparing the server-side logic of a web application, developing the applications back-end components and linking it with other web services. They also design and maintain Python scripts and codes to automate tasks.', 'Python developers design, code, and deploy development projects in the Python language.\r\nThey also work on debugging those same projects to ensure they function as intended.\r\nAs a python developer, you will work closely with other teams, including data collection and analytics, to help answer questions and provide insight.', 'INFOSYS', 'Powered by Intellect, Driven by Values', '', 'www.infosys.com', '', '', '', 0x323031372d30352d3032543133323534345a5f325f4c594e584d50454434313036435f5254524f5054505f335f494e464f5359532d524553554c54532e61766966),
(30, 3, 0x576861742d69732d612d4465764f70732d656e67696e6565722d616e642d74686569722d726f6c652d696e2d612d736f6674776172652d646576656c6f706d656e742d7465616d2d706c75732d6a6f622d6f70706f7274756e69746965732d616e642d73616c61726965732e706e67, 'microsoft@gmail.com', 'DEVOPS ENGINEER', '2024-04-03', '2024-04-18', 'Gurgaon', 'Full Time', 'Any', 'UNDER_GRADUATE', '0-1 Year Experience', '60k', '', 'DevOps is a methodology that has evolved from the experience and best practices of managing the development, testing, and support processes in a software development project life cycle. These practices help organizations manage the development, tools deployment, integrated testing, and assistance with increased productivity and speed. At the same time, they bring the critical elements of continuous integration and continuous deployment to the DevOps engineer’s sole responsibility.', 'Deploy updates and fixes, and provide Level 2 technical support.\r\nBuild tools to reduce occurrence of errors and improve customer experience.\r\nDevelop software to integrate with internal back-end systems.\r\nPerform root cause analysis of production errors and resolve technical issues.', 'MICROSOFT', 'Be Whats Next!', '', 'www.microsoft.com', '', '', '', 0x6d7366742d6d6963726f736f66742d6c6f676f2d322d332e77656270);

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_signup`
--

CREATE TABLE `recruiter_signup` (
  `sno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `compname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'Recruiter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruiter_signup`
--

INSERT INTO `recruiter_signup` (`sno`, `fname`, `lname`, `compname`, `email`, `password`, `role`) VALUES
(1, 'varun', 'singh', 'infosys', 'varun134657@gmail.com', '$2y$10$7nb.yh4.d.8sBeMxvL4cR.Uz.4.Q/fteSrOYtDwZDE4vWfDEnCWaK', 'Recruiter'),
(3, 'Microsft', '', '', 'microsoft@gmail.com', '$2y$10$bXKPU3VeZyLn23HCYYHMC.z4GTIs9jBbP2gjLek/hClTWhHlwaYFq', 'Recruiter'),
(4, 'Infosys', '', '', 'infosys@gmail.com', '$2y$10$fuDPIoXw2kmVhTyTZrYYRuWJHz4Zx7pnjmtgltfi389e.7.pAWXSC', 'Recruiter');

-- --------------------------------------------------------

--
-- Table structure for table `single_blog`
--

CREATE TABLE `single_blog` (
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyjob`
--
ALTER TABLE `applyjob`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `candidate_signup`
--
ALTER TABLE `candidate_signup`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `post_job`
--
ALTER TABLE `post_job`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `recruiter_signup`
--
ALTER TABLE `recruiter_signup`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `single_blog`
--
ALTER TABLE `single_blog`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applyjob`
--
ALTER TABLE `applyjob`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate_signup`
--
ALTER TABLE `candidate_signup`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `sno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `fid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_job`
--
ALTER TABLE `post_job`
  MODIFY `sno` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `recruiter_signup`
--
ALTER TABLE `recruiter_signup`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `single_blog`
--
ALTER TABLE `single_blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
