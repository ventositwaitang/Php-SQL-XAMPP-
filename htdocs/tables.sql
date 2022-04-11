CREATE DATABASE IF NOT EXISTS fitness_company;

CREATE TABLE IF NOT EXISTS Branch(
	branch_ID INT(11) NOT NULL,
    name varchar(255) NOT NULL,
    address_street text,
    address_district text,
    PRIMARY KEY (branch_ID)
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS Instructor(
	instructor_ID INT(11) NOT NULL,
    name varchar(255) NOT NULL,
    year_of_experience INT(11) UNSIGNED,
    PRIMARY KEY (instructor_ID)
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Class(
	class_ID INT(11) NOT NULL,
    name varchar(255) NOT NULL,
    description text,
    date DATE NOT NULL,
    capacity INT(11) UNSIGNED NOT NULL,
    branch_ID INT(11),
    instructor_ID INT(11),
    PRIMARY KEY (class_ID),
    FOREIGN KEY (branch_ID) REFERENCES Branch (branch_ID),
    FOREIGN KEY (instructor_ID) REFERENCES Instructor (instructor_ID)
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Member(
	member_ID INT(11) NOT NULL PRIMARY KEY,
    name varchar(255) NOT NULL,
    date_of_birth DATE NOT NULL,
    referrer_ID INT(11)
    --FOREIGN KEY (referrer_ID) REFERENCES Member (member_ID)   ### ALTER BELOW
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Enrollment (
	member_ID INT(11) NOT NULL,
    class_ID INT(11) NOT NULL,
    FOREIGN KEY (member_ID) REFERENCES Member (member_ID),
    FOREIGN KEY (class_ID) REFERENCES Class (class_ID)
)ENGINE=INNODB;

-- ----------------------------
-- Records of Branch
-- ----------------------------
INSERT INT(11)O `Branch` (`branch_ID`, `name`, `address_street`, `address_district`) VALUES
(5, 'Jungle Workout Studios', 'Castle Peak Road', 'Yuen Long'),
(4, 'We Lift Iron', 'Morrison Hill Road', 'Hong Kong Island (Mid-levels)'),
(2, 'Strength Center', 'Dai Wang Street', 'Tai Po'),
(3, 'The Muscle Studio', 'Ting Kok Road', 'Tai Po'),
(1, 'Fitness Heroes', 'Pok Fu Lam Road', 'Hong Kong Island (West from North PoINT(11))');

-- ----------------------------
-- Records of Instructor
-- ----------------------------

INSERT INT(11)O `Instructor` (`instructor_ID`, `name`, `year_of_experience`) VALUES
(4, 'Jhon Fang', 1),
(3, 'Jerry Leung', 1),
(2, 'Jenifer Chiu', 2),
(1, 'Tom Ng', 3),
(5, 'Tomas Cheung', 5),
(6, 'Hua Chiu', 3),
(7, 'Tomas Tse', 5),
(8, 'Kevin Ho', 3),
(9, 'Stevin Chan', 5),
(10, 'May Wong', 3);


-- ----------------------------
-- Records of Class
-- ----------------------------


INSERT INT(11)O `Class` (`class_ID`, `name`, `description`, `date`, `capacity`, `branch_ID`, `instructor_ID`) VALUES
(10, 'INT(11)ense gym class (WLI)', 'Strength Center offers INT(11)ense, weight-based group workouts that will leave you panting for breath.', '2022-01-03', '7', 4, 9),
(9, 'Nutrition class (ST)', 'This class teach to promote healthy eating and eating habits that can contribute to a healthy lifestyle.', '2022-01-06', '6', 2, 10),
(8, 'Safety class I (FH)', 'Five lessons that teach the importance of safety in sports activities!', '2022-01-10', '12', 1, 10),
(7, 'Yoga class (SC)', 'With a range of well-designed lessons on this class, you\'ll get to try a wide variation, including ones specifically practised for de-stressing (who isn\'t stressed these days?)', '2022-01-16', '3', 2, 1),
(6, 'Yoga class (WLI)', 'From Aerial, Hoop and Wheel Yoga to Mat Pilates, you can expect a range of high-quality yoga classes and a flexible schedule at either of its two studios in Hong Kong.', '2022-01-23', '6', 4, 1),
(5, 'Yoga class (TMS)', 'It\'ll take you a while to get through all the lessons on our schedule: from hot yoga, wall rope yoga and Hatha yoga to special classes such as Yoga for Runners and Yoga for Office Workers, you\'ll be spoilt for choice at the variety on offer.', '2022-01-02', '19', 3, 9),
(4, 'Pure Yoga class (SC)', 'Our Yoga class is a known favourite in Hong Kong, specialising in Pilates, Hatha Yoga and Xtend Barre.', '2022-01-02', '12', 2, 6),
(3, 'INT(11)roduce to Yoga (FH)', 'This is a very short course to INT(11)roduce the curriculum design of our yoga class', '2022-02-01', '5', 1, 9),
(2, 'new Yoga calss II (FH)', 'This module will contatin Hatha yoga and also the Ashtanga yoga lesson.', '2021-12-06', '6', 1, 1),
(1, 'Yoga class I (FH)', 'This is a Hatha yoga class.', '2022-01-02', '30', 1, 1),
(11, 'INT(11)ense gym class (JWS)', 'This boxing studio is the first of its kind in Hong Kong, with glowing lights inside a dark room, booming beats and dedicated instructors-fifty minutes of class will fly by in the blink of an eye.', '2022-01-02', '10', 5, 7),
(12, 'Water Aerobics (JWS)', 'We will offer aerobic endurance and resistance training in this course.', '2022-06-20', '21', 5, 1),
(13, 'Water Aerobics I (TMS)', 'There are different forms of water aerobics include in this class: aqua Zumba, water yoga, aqua aerobics, and aqua jog.', '2022-06-20', '5', 3, 10),
(14, 'Water Aerobics II (TMS)', 'Except from the contents in Water Aerobics I, there will also have aua aerobics and aqua jog training in this class', '2022-10-20', '7', 3, 3),
(15, 'Water Aerobics (FH)', 'Benefits of this method include less stress on the back, hips, knees and ankles.', '2022-06-20', '10', 1, 6),
(16, 'Safety class II (FH)', 'Five lessons that teach the importance of safety in sports activities.', '2022-01-02', '3', 1, 2),
(17, 'Safety class (SC)', 'Five lessons that teach the importance of safety in sports activities.', '2022-02-02', '19', 2, 9),
(18, 'Safety class (TMS)', 'Five lessons that teach the importance of safety in sports activities.', '2022-02-12', '6', 3, 5),
(19, 'Safety class (WLI)', 'Five lessons that teach the importance of safety in sports activities.', '2022-02-15', '9', 4, 6),
(20, 'Nutrition class (FH)', 'This class teach to promote healthy eating and eating habits that can contribute to a healthy lifestyle.', '2022-02-16', '6', 1, 10),
(21, 'Nutrition class (TMS)', 'This class teach to promote healthy eating and eating habits that can contribute to a healthy lifestyle.', '2022-02-20', '8', 3, 9),
(22, 'Nutrition class (WLI)', 'This class teach to promote healthy eating and eating habits that can contribute to a healthy lifestyle.', '2022-02-21', '10', 4, 9),
(23, 'Nutrition class (JWS)', 'This class teach to promote healthy eating and eating habits that can contribute to a healthy lifestyle.', '2022-02-23', '3', 5, 10),
(24, 'INT(11)ense gym class (JWS)', 'Strength Center offers INT(11)ense, weight-based group workouts that will leave you panting for breath.', '2022-02-26', '3', 5, 9),
(25, 'INT(11)ense gym class (TMS)', 'Strength Center offers INT(11)ense, weight-based group workouts that will leave you panting for breath.', '2022-03-02', '10', 3, 2),
(26, 'INT(11)ense gym class (TMS)', 'Strength Center offers INT(11)ense, weight-based group workouts that will leave you panting for breath.', '2022-03-03', '6', 3, 3);

-- ----------------------------
-- Records of Member
-- ----------------------------

INSERT INT(11)O `Member` (`member_ID`, `name`, `date_of_birth`, `referrer_ID`) VALUES
(8, 'Alex', '2005-03-03', 3),
(7, 'Hickey', '2008-09-23', 5),
(6, 'Alice', '2007-09-18', 5),
(5, 'Jimmy', '2006-08-10', 3),
(4, 'jay', '2006-01-09', 3),
(3, 'Tom', '2006-08-08', 2),
(2, 'Terry', '2005-01-01', NULL),
(1, 'Jack', '2005-08-20', NULL),
(9, 'Vivian', '2005-04-30', 5),
(10, 'Gwendolyn', '2005-07-23', 5),
(11, 'Wilson', '1986-09-22', 3),
(12, 'Brian', '1998-08-20', 3),
(13, 'Roberto', '2000-01-01', 5),
(14, 'Ramon', '1996-08-08', 6),
(15, 'Liam', '1997-01-09', 6),
(16, 'Ethan', '2001-08-10', 5),
(17, 'Lewis', '1994-09-18', 3),
(18, 'Milton', '1988-09-23', NULL),
(19, 'Alex', '1987-03-03', 10),
(20, 'Claude', '1997-04-30', 10),
(21, 'Joshua', '1989-07-23', 10),
(22, 'Wilson', '2006-09-22', 10),
(23, 'Harvey', '2005-07-23', 10),
(24, 'Antonio', '1997-01-09', 10),
(25, 'Julian', '2001-08-10', 3),
(26, 'Aidan', '1994-09-18', 9),
(27, 'Harold', '1988-09-23', 10),
(28, 'Peter', '1987-03-03', 9),
(29, 'Hunter', '1997-04-30', 9),
(30, 'Eli', '1989-07-23', 3),
(31, 'Alberto', '1986-09-22', 2),
(32, 'Carlos', '1989-07-23', 1),
(33, 'Aaron', '1989-07-23', 1),
(34, 'Paul', '1986-09-22', 1),
(35, 'Ricardo', '1989-07-23', 10),
(36, 'Hector', '1989-07-23', 10),
(37, 'Stephen', '1988-09-23', NULL),
(38, 'Larry', '1987-03-03', 10),
(39, 'Justin', '1997-04-30', 10),
(40, 'Scott', '1989-07-23', 10),
(41, 'Brandon', '2006-09-22', 10),
(42, 'Samuel', '2005-07-23', 10),
(43, 'Alexander', '1997-01-09', 10),
(44, 'Patrick', '2001-08-10', 3),
(45, 'Jack', '1994-09-18', 9),
(46, 'Dennis', '1988-09-23', 10),
(47, 'Jerry', '1987-03-03', 9),
(48, 'Adam', '1997-04-30', 9),
(49, 'Henry', '1989-07-23', 3),
(50, 'Nathan', '1986-09-22', 2),
(51, 'Douglas', '1989-07-23', 1),
(52, 'Zachary', '1989-07-23', 1),
(53, 'Peter', '1986-09-22', 1),
(54, 'Walter', '1989-07-23', 10),
(55, 'Ethan', '1989-07-23', 10),
(56, 'Jeremy', '1989-07-23', 3),
(57, 'Keith', '1986-09-22', 2),
(58, 'Christian', '1989-07-23', 1);

-- ----------------------------
-- Records of Enrollment
-- ----------------------------
INSERT INT(11)O `Enrollment` (`member_ID`, `class_ID`) VALUES
(26, 8),
(26, 9),
(29, 9),
(30, 8),
(3, 15),
(16, 14),
(13, 13),
(12, 12),
(11, 15),
(7, 13),
(26, 13),
(18, 14),
(17, 13),
(35, 12),
(32, 15),
(31, 14),
(23, 15),
(28, 14),
(25, 13),
(9, 12),
(10, 15),
(6, 14),
(2, 13),
(1, 12),
(23, 9),
(21, 8),
(20, 9),
(17, 8),
(15, 9),
(10, 8),
(9, 9),
(6, 8),
(32, 9),
(35, 8),
(33, 9),
(4, 1),
(4, 4),
(5, 7),
(5, 1),
(6, 7),
(6, 2),
(7, 5),
(7, 4),
(8, 7),
(9, 7),
(10, 6),
(10, 4),
(11, 5),
(11, 3),
(11, 2),
(10, 5),
(10, 7),
(8, 2),
(6, 3),
(37, 26),
(38, 26),
(39, 25),
(40, 25),
(41, 23),
(42, 23),
(43, 23),
(44, 11),
(45, 11),
(46, 11),
(47, 22),
(48, 22),
(49, 19),
(50, 10),
(51, 21),
(52, 21),
(53, 21),
(54, 18),
(55, 17),
(56, 17),
(58, 20),
(57, 17),
(40, 6),
(41, 8),
(42, 8),
(43, 8);

ALTER TABLE Member
ADD FOREIGN KEY (referrer_ID) REFERENCES Member (member_ID);





-- SELECT branch_ID , name FROM `branch` WHERE DISTINCT = 'Tai Po';

-- SELECT instructor_ID , name, year_of_experience FROM instructor WHERE year_of_experience > 2 ORDER BY year_of_experience DESC, instructor_ID ASC;

-- SELECT class_ID, name, description, date FROM class WHERE name LIKE 'Yoga%' OR description LIKE '%Hatha%' AND description LIKE '%Ashtanga%' ORDER BY class_ID DESC;

-- SELECT member.member_ID , member.name FROM member WHERE member_ID IN ( SELECT member_ID FROM enrollment WHERE class_ID IN (SELECT class_ID FROM class WHERE name LIKE 'Water Aerobics%')) ORDER BY member_ID DESC;

-- SELECT member_ID , name, TIMESTAMPDIFF(YEAR,date_of_birth,CURDATE()) AS age FROM member WHERE member_ID IN ( SELECT member_ID FROM enrollment WHERE class_ID IN ( SELECT class_ID FROM class WHERE instructor_ID IN ( SELECT instructor_ID FROM instructor WHERE name = 'May Wong' ))) and TIMESTAMPDIFF(YEAR,date_of_birth,CURDATE()) < 18 ORDER BY member_ID DESC;
-- -- age INT(11) AS (year(CURRENT_TIMESTAMP) - year(date_of_birth)));

-- SELECT C.instructor_ID, (SELECT I.name From Instructor I where I.instructor_ID = C.instructor_ID), COUNT(C.instructor_ID) as num_of_classes 
-- FROM Class C
-- GROUP BY C.instructor_ID
-- HAVING COUNT(C.instructor_ID) > 3
-- ORDER BY C.instructor_ID DESC;

-- SELECT I.instructor_ID, I.name, count(DISTINCT E.member_ID) as num_of_students
-- FROM Enrollment E INNER JOIN Class C INNER JOIN Instructor I 
-- WHERE E.class_ID = C.class_ID and C.instructor_ID = I.instructor_ID
-- GROUP BY I.instructor_ID 
-- HAVING num_of_students > 5
-- ORDER BY I.instructor_ID DESC

-- SELECT M.referrer_ID, R.name, count(M.referrer_ID) as num_of_referee
-- FROM Member M INNER JOIN Member R 
-- WHERE M.referrer_ID = R.member_ID
-- GROUP BY M.referrer_ID 
-- HAVING num_of_referee > 2
-- ORDER BY M.referrer_ID DESC

-- SELECT B.name, count(C.class_ID) as class_num
-- FROM Branch B INNER JOIN Class C
-- WHERE B.branch_ID = C.branch_ID
-- GROUP BY C.branch_ID
-- ORDER BY B.branch_ID DESC