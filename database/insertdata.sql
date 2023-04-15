
-- Insert 10 users into database
INSERT INTO `users` (`firstname`, `lastname`, `username`, `password`, `email`, `phone`, `avatar`, `type`) 
VALUES 
-- user 1
('Kara-lynn', 'Bownas', 'kbownas0', 'd787HoJ', 'kbownas0@gmail.com', '0402849675', 'https://i.ibb.co/VBFY9Dr/male-avatar.jpg', 1),
-- user 2
('Karoly', 'Bretelle', 'kbretelle1', 'u4QeRRmDZm', 'kbretelle1@gmail.com', '0477247106', 'https://i.ibb.co/VBFY9Dr/male-avatar.jpg', 1),
-- user 3
('Ingra', 'Brugger', 'ibrugger2', '6f3iWv', 'ibrugger2@gmail.com', '0559349117', 'https://i.ibb.co/VBFY9Dr/male-avatar.jpg', 1),
-- user 4
('Michell', 'Medford', 'mmedford3', '923HIpspSW', 'mmedford3@gmail.com', '0325057104', 'https://i.ibb.co/x3wfK5z/female-avatar.jpg', 1),
-- user 5
('Cart', 'Stringman', 'cstringman4', 'bXrwL5u0Rx', 'cstringman4@gmail.com', '0631353477', 'https://i.ibb.co/VBFY9Dr/male-avatar.jpg', 1),
-- user 6
('Sabine', 'Baguley', 'sbaguley5', 'MueVGBK3P1', 'sbaguley5@gmail.com', '0872532363', 'https://i.ibb.co/VBFY9Dr/male-avatar.jpg', 1),
-- user 7
('Coralie', 'Carslaw', 'ccarslaw6', 'KhxDlTK', 'ccarslaw6@gmail.com', '0401625846', 'https://i.ibb.co/VBFY9Dr/male-avatar.jpg', 1),
-- user 8
('Garvin', 'Galbreth', 'ggalbreth7', 'TQPVl9gHqwlC', 'ggalbreth7@gmail.com', '0867198979', 'https://i.ibb.co/VBFY9Dr/male-avatar.jpg', 1),
-- user 9
('Cirilo', 'Nosworthy', 'cnosworthy8', 'YkQc06M', 'cnosworthy8@gmail.com', '0861791717', 'https://i.ibb.co/x3wfK5z/female-avatar.jpg', 1),
-- user 10
('Gertrudis', 'Espinas', 'gespinas9', 'TYgZMwz', 'gespinas9@gmail.com', '0291168164', 'https://i.ibb.co/VBFY9Dr/male-avatar.jpg', 1);

-- Insert resumes for each user
INSERT INTO `resume` (`user_id`, `objective`)
VALUES
  -- User 1
  (1, 'Web developer'),
  -- User 2
  (2, 'Business Analyst'),
  -- User 3
  (3, 'Accountant'),
  -- User 4
  (4, 'Software Engineer'),
  -- User 5
  (5, 'Associate Electrical Engineer'),
  -- User 6
  (6, 'Administrative Assistant'),
  -- User 7
  (7, 'Customer Service Representative'),
  -- User 8
  (8, 'Marketing Coordinator'),
  -- User 9
  (9, 'Mentor'),
  -- User 10
  (10, 'Content Creator');

-- Insert education for each user
INSERT INTO `education` (`resume_id`, `user_id`, `school`, `degree`, `major`)
VALUES
  -- User 1
  (1, 1, 'University of California', 'Bachelor of Science', 'Computer Science'),
  -- User 2
  (2, 2, 'University of Michigan', 'Bachelor of Arts', 'Business Administration'),
  -- User 3
  (3, 3, 'University of Illinois', 'Master of Accountancy', 'Accounting'),
  -- User 4
  (4, 4, 'Massachusetts Institute of Technology', 'Bachelor of Science', 'Computer Science'),
  -- User 5
  (5, 5, 'Stanford University', 'Bachelor of Science', 'Electrical Engineering'),
  -- User 6
  (6, 6, 'University of Texas at Austin', 'Bachelor of Science', 'Business Administration'),
  -- User 7
  (7, 7, 'Arizona State University', 'Bachelor of Arts', 'Communication'),
  -- User 8
  (8, 8, 'Columbia University', 'Master of Business Administration', 'Marketing'),
  -- User 9
  (9, 9, 'Virginia Polytechnic Institute and State University', 'Bachelor of Science', 'Mechanical Engineering'),
  -- User 10
  (10, 10, 'University of Washington', 'Bachelor of Arts', 'English');

-- Insert certificates for each user
INSERT INTO `certificate` (`resume_id`, `user_id`, `title`, `organization`, `value`, `obtained_date`, `expiration_date`)
VALUES
  -- User 1
  (1, 1, 'Certified Web Developer', 'Web Development Institute', 'Passed', '2021-01-15', NULL),
  (1, 1, 'Google Analytics Individual Qualification', 'Google', 'Passed', '2021-02-01', '2022-02-01'),
  -- User 2
  (2, 2, 'Certified Business Analyst', 'International Institute of Business Analysis', 'Passed', '2022-03-22', NULL),
  -- User 3
  (3, 3, 'Certified Public Accountant', 'American Institute of Certified Public Accountants', 'Passed', '2020-07-01', '2025-06-30'),
  -- User 4
  (4, 4, 'AWS Certified Developer - Associate', 'Amazon Web Services', 'Passed', '2020-05-12', NULL),
  -- User 5
  (5, 5, 'Certified Electrical Engineer', 'Institute of Electrical and Electronics Engineers', 'Passed', '2019-12-30', NULL),
  -- User 6
  (6, 6, 'Certified Administrative Professional', 'International Association of Administrative Professionals', 'Passed', '2022-02-01', NULL),
  -- User 7
  (7, 7, 'Certified Customer Service Professional', 'National Customer Service Association', 'Passed', '2021-11-15', NULL),
  (7, 7, 'Project Management Professional', 'Project Management Institute', 'Passed', '2018-10-01', '2023-10-01'),
  -- User 8
  (8, 8, 'Google Ads Certification', 'Google', 'Passed', '2021-06-25', NULL),
  -- User 9
  (9, 9, 'Lean Six Sigma Green Belt', 'International Association for Six Sigma Certification', 'Passed', '2022-01-10', NULL),
  -- User 10
  (10, 10, 'Certified Writer', 'National Writers Association', 'Passed', '2021-09-03', NULL);
  

-- Insert experience for each user
INSERT INTO `experience` (`resume_id`, `user_id`, `experience`, `duration_years`, `duration_months`, `description`)
VALUES
  -- User 1
  (1, 1, 'Freelance Web Developer', 2, 0, 'Designed and developed modern, responsive websites and web applications using HTML, CSS, JavaScript and Bootstrap.'),
  -- User 2
  (2, 2, 'Business Analyst', 3, 6, 'Conducted market research and prepared detailed reports on findings. Collaborated with cross-functional teams to define project requirements, goals, and timelines.'),
  -- User 3
  (3, 3, 'Senior Accountant', 5, 0, 'Performed monthly, quarterly and annual close procedures, analyzed financial statements and provided recommendations for improvement of financial performance. Mentored and trained junior accountants.'),
  -- User 4
  (4, 4, 'Software Developer', 4, 3, 'Developed and maintained software applications in Java and Python. Participated in code reviews and provided technical guidance and support to team members.'),
  -- User 5
  (5, 5, 'Associate Electrical Engineer', 2, 9, 'Designed, tested, and maintained electrical equipment, systems and components. Troubleshot technical issues and provided guidance to technicians and engineers.'),
  -- User 6
  (6, 6, 'Administrative Assistant', 1, 6, 'Provided administrative support to department managers and executives. Scheduled meetings, managed calendars, and maintained confidential records.'),
  -- User 7
  (7, 7, 'Customer Service Representative', 2, 0, 'Handled inbound and outbound calls from customers, resolved issues and provided excellent customer service. Maintained accurate records of communications.'),
  -- User 8
  (8, 8, 'Marketing Coordinator', 2, 0, 'Developed and executed marketing campaigns across digital and traditional channels. Analyzed campaign data and provided insights to optimize performance.'),
  -- User 9
  (9, 9, 'Mechanical Engineer', 3, 0, 'Designed and developed mechanical components and systems for various projects. Conducted design reviews and managed project timelines.'),
  -- User 10
  (10, 10, 'Content Writer', 1, 0, 'Researched and produced engaging, well-researched and informative content for clients across various industries. Conducted keyword research and optimized content for search engines.');

-- Insert working history for each user
INSERT INTO `working_history` (`resume_id`, `user_id`, `position`, `company_name`, `start_date`, `end_date`, `tasks`)
VALUES
  -- User 1
  (1, 1, 'Web Developer', 'ABC Company', '2018-06-01', '2020-12-31', 'Developed and maintained custom websites and web applications using HTML, CSS, JavaScript, and PHP. Collaborated with clients and designers to ensure project accuracy and completed projects on time.'),
  (1, 1, 'Web Developer', 'ABC Company', '2021-05-01', '2023-3-31', 'Developed and maintained custom websites and web applications using HTML, CSS, JavaScript, and PHP.'),
  -- User 2
  (2, 2, 'Business Analyst', 'XYZ Corporation', '2019-01-01', '2022-03-31', 'Worked closely with key stakeholders to model business processes, gather and define business requirements. Conducted system analysis, developed use cases and prepared functional specifications.'),
  -- User 3
  (3, 3, 'Senior Accountant', 'Super Accounting Firm', '2017-05-01', '2022-07-31', 'Conducted multiple audits of firms and provided internal control analysis while communicating documents and performing fieldwork.'),
  -- User 4
  (4, 4, 'Software Developer', 'Global Software Solutions', '2018-12-01', '2023-01-31', 'Coded, tested and deployed software applications, APIs and software libraries. Worked in a team environment with frequent code reviews.'),
  -- User 5
  (5, 5, 'Associate Electrical Engineer', 'Electricity Innovations', '2020-02-15', '2022-11-30', 'Constructed, implemented and analyzed electrical testing to provide safety and optimization in electrical products. Collaborated in a team environment to ensure goal completion.'),
  -- User 6
  (6, 6, 'Administrative Assistant', 'Super Industries, Inc.', '2021-04-01', '2021-02-29', 'Answered calls and greeted visitors, assigned schedules and acted as the point of contact for all executive appointments.'),
  -- User 7
  (7, 7, 'Customer Service Representative', 'Helpful Corp.', '2019-03-01', '2021-02-28', 'Provided top-notch customer service using voice and digital channels. Provided solutions to consumer problems by escalating larger issues to management staff when necessary.'),
  -- User 8
  (8, 8, 'Marketing Coordinator', 'Marketing Firm', '2021-06-01', '2023-01-31', 'Designed and implemented digital marketing campaigns using a variety of mediums on channels like LinkedIn, Instagram, and Twitter. Analyzed campaign success and made recommendations for updates to the company strategy.'),
  -- User 9
  (9, 9, 'Mechanical Engineer', 'Mechanical Industries, LLC', '2018-07-01', '2021-07-31', 'Researched, designed and created mechanical systems in machines and structures. Collaborated with a team to ensure the completion of important projects.'),
  -- User 10
  (10, 10, 'Content Writer', 'Content Creation, Inc.', '2022-02-01', '2023-01-31', 'Wrote engaging content across a variety of web products, ranging from press releases to landing pages to full-fledged articles. Worked with clients to develop content strategies that were appropriate to their specific needs.');

-- Insert additional information for each user
INSERT INTO `additional_information` (`resume_id`, `user_id`, `hobbies`, `habits`, `personal_info`)
VALUES
(1, 1, 'Playing guitar, camping, hiking', 'Regular exercise, healthy eating habits', 'I am fluent in Spanish and have lived abroad for several years.'),

(2, 2, 'Traveling, reading', 'Morning yoga routine, regular meditation', 'I am passionate about sustainable living and take steps to reduce my carbon footprint.'),

(3, 3, 'Playing tennis, skiing', 'Regular exercise, healthy eating habits', 'I am an avid traveller and have visited over 20 countries.'),

(4, 4, 'Hiking, painting', 'Regular exercise, yoga', 'I am a certified yoga instructor and teach classes on the weekends.'),

(5, 5, 'Photography, hiking', 'Regular exercise, healthy eating habits', 'I am a dog lover and have two rescue dogs.'),

(6, 6, 'Volunteering, playing piano', 'Regular exercise, healthy eating habits', 'I am passionate about social justice and human rights issues.'),

(7, 7, 'Playing basketball, hiking', 'Regular exercise, healthy eating habits', 'I am an accomplished public speaker and have given keynote addresses at several conferences.'),

(8, 8, 'Blogging, playing guitar', 'Regular exercise, healthy eating habits', 'I am a lifelong learner and enjoy taking courses in various subjects.'),

(9, 9, 'Reading, woodworking', 'Regular exercise, meditation', 'I enjoy taking on DIY projects and have built several pieces of furniture for my home.'),

(10, 10, 'Playing volleyball, camping', 'Regular exercise, healthy eating habits', 'I am a big sports fan and enjoy watching and playing a variety of sports.');

INSERT INTO `reference` (`resume_id`, `user_id`, `firstname`, `lastname`, `email`, `phone`, `relationship`)
VALUES
(1, 1, 'Sarah', 'Lee', 'sarahlee@email.com', '1234567890', 'Former Manager'),

(1, 1, 'David', 'Kim', 'davidkim@email.com', '1234567890', 'Former Colleague'),

(2, 2, 'Mark', 'Chen', 'markchen@email.com', '1234567890', 'Former Manager'),

(2, 2, 'Emily', 'Wang', 'emilywang@email.com', '1234567890', 'Former Tutor'),

(3, 3, 'Amy', 'Zhang', 'amyzhang@email.com', '1234567890', 'Former Manager'),

(3, 3, 'Michael', 'Li', 'michaelli@email.com', '1234567890', 'Former Colleague'),

(4, 4, 'Jennifer', 'Kim', 'jenniferkim@email.com', '1234567890', 'Former Supervisor'),

(5, 5, 'Daniel', 'Cho', 'danielcho@email.com', '1234567890', 'Former Colleague'),

(6, 6, 'Andrew', 'Kwon', 'andrewkwon@email.com', '1234567890', 'Former Manager'),

(8, 8, 'Jessica', 'Park', 'jessicapark@email.com', '1234567890', 'Former Colleague');
