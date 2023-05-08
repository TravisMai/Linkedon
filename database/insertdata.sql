
-- Insert 10 users into database
INSERT INTO `users` (`firstname`, `lastname`, `username`, `password`, `email`, `phone`, `address`, `avatar`, `type`) 
VALUES 
-- user 1
('Kara-lynn', 'Bownas', 'kbownas0', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'kbownas0@gmail.com', '0402849675', 'Sydney, Australia', 'uploads/female1.jpg', 0),
-- user 2
('Siuu', 'Bretelle', 'kbretelle1', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'kbretelle1@gmail.com', '0477247106', 'Melbourne, Australia', 'uploads/male1.jpg', 0),
-- user 3
('Ingra', 'Brugger', 'ibrugger2', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'ibrugger2@gmail.com', '0559349117', 'Brisbane, Australia', 'uploads/female2.jpg', 0),
-- user 4
('Michell', 'Medford', 'mmedford3', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'mmedford3@gmail.com', '0325057104', 'Adelaide, Australia', 'uploads/male2.jpg', 0),
-- user 5
('Cart', 'Stringman', 'cstringman4', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'cstringman4@gmail.com', '0631353477', 'Perth, Australia', 'uploads/female3.jpg', 0),
-- user 6
('Sabine', 'Baguley', 'sbaguley5', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'sbaguley5@gmail.com', '0872532363', 'Hobart, Australia', 'uploads/male3.jpg', 0),
-- user 7
('Coralie', 'Carslaw', 'ccarslaw6', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'ccarslaw6@gmail.com', '0401625846', 'Darwin, Australia', 'uploads/female4.jpg', 0),
-- user 8
('Garvin', 'Galbreth', 'ggalbreth7', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'ggalbreth7@gmail.com', '0867198979', 'Canberra, Australia', 'uploads/male4.jpg', 0),
-- user 9
('Cirilo', 'Nosworthy', 'cnosworthy8', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'cnosworthy8@gmail.com', '0861791717', 'Gold Coast, Australia', 'uploads/female5.jpg', 0),
-- user 10
('Gertrudis', 'Espinas', 'gespinas9', '$2y$10$cJAewUStwaJsscmFmQ.09eL08hWQs38.hdfUkNww9c8JCcCTLLuyK', 'gespinas9@gmail.com', '0291168164', 'Newcastle, Australia', 'uploads/male5.jpg', 0);


-- Insert resumes for each user
-- `position` varchar(255) NOT NULL,
--    `employment_type` varchar(255) NOT NULL,
 --   `desire_salary` int(10) NOT NULL,
  --  `goals` text NOT NULL,
INSERT INTO `resume` (`user_id`, `position`, `employment_type`, `desire_salary`, `goals`)
VALUES
  -- User 1
  (1, 'Web developer', 'Full-time', 10, 'To become an expert in web development'),
  -- User 2
  (2, 'Business Analyst', 'Full-time', 90, 'To help companies make data-driven decisions'),
  -- User 3
  (3, 'Accountant', 'Part-time', 50, 'To gain more experience in accounting'),
  -- User 4
  (4, 'Software Engineer', 'Full-time', 120, 'To work on challenging projects and innovate'),
  -- User 5
  (5, 'Associate Electrical Engineer', 'Full-time', 80, 'To design and implement electrical systems'),
  -- User 6
  (6, 'Administrative Assistant', 'Contract', 60, 'To provide efficient administrative support'),
  -- User 7
  (7, 'Customer Service Representative', 'Full-time', 50, 'To provide excellent service to customers'),
  -- User 8
  (8, 'Marketing Coordinator', 'Full-time', 70, 'To develop and implement effective marketing plans'),
  -- User 9
  (9, 'Mentor', 'Part-time', 30, 'To help guide and inspire others'),
  -- User 10
  (10, 'Content Creator', 'Full-time', 80, 'To create engaging and informative content for audiences');


-- Insert education for each user
INSERT INTO `education` (`resume_id`, `user_id`, `school`, `degree`, `major`, `year`, `gpa`)
VALUES
  -- User 1
  (1, 1, 'University of California', 'Bachelor of Science', 'Computer Science', '2021', '8'),
  -- User 2
  (2, 2, 'University of Michigan', 'Bachelor of Arts', 'Business Administration', '2021', '7'),
  -- User 3
  (3, 3, 'University of Illinois', 'Master of Accountancy', 'Accounting', '2021', '7'),
  -- User 4
  (4, 4, 'Massachusetts Institute of Technology', 'Bachelor of Science', 'Computer Science', '2021', '7'),
  -- User 5
  (5, 5, 'Stanford University', 'Bachelor of Science', 'Electrical Engineering', '2021', '9'),
  -- User 6
  (6, 6, 'University of Texas at Austin', 'Bachelor of Science', 'Business Administration', '2021', '8'),
  -- User 7
  (7, 7, 'Arizona State University', 'Bachelor of Arts', 'Communication', '2021', '8'),
  -- User 8
  (8, 8, 'Columbia University', 'Master of Business Administration', 'Marketing', '2021', '10'),
  -- User 9
  (9, 9, 'Virginia Polytechnic Institute and State University', 'Bachelor of Science', 'Mechanical Engineering', '2021', '10'),
  -- User 10
  (10, 10, 'University of Washington', 'Bachelor of Arts', 'English', '2021', '10');

-- Insert certificates for each user
INSERT INTO `certificate` (`resume_id`, `user_id`, `title`, `organization`, `obtained_date`, `expiration_date`)
VALUES
  -- User 1
  (1, 1, 'Certified Web Developer', 'Web Development Institute', '2021-01-15', NULL),
  (1, 1, 'Google Analytics Individual Qualification', 'Google', '2021-02-01', '2022-02-01'),
  -- User 2
  (2, 2, 'Certified Business Analyst', 'International Institute of Business Analysis', '2022-03-22', NULL),
  -- User 3
  (3, 3, 'Certified Public Accountant', 'American Institute of Certified Public Accountants', '2020-07-01', '2025-06-30'),
  -- User 4
  (4, 4, 'AWS Certified Developer - Associate', 'Amazon Web Services', '2020-05-12', NULL),
  -- User 5
  (5, 5, 'Certified Electrical Engineer', 'Institute of Electrical and Electronics Engineers', '2019-12-30', NULL),
  -- User 6
  (6, 6, 'Certified Administrative Professional', 'International Association of Administrative Professionals', '2022-02-01', NULL),
  -- User 7
  (7, 7, 'Certified Customer Service Professional', 'National Customer Service Association', '2021-11-15', NULL),
  (7, 7, 'Project Management Professional', 'Project Management Institute', '2018-10-01', '2023-10-01'),
  -- User 8
  (8, 8, 'Google Ads Certification', 'Google', '2021-06-25', NULL),
  -- User 9
  (9, 9, 'Lean Six Sigma Green Belt', 'International Association for Six Sigma Certification', '2022-01-10', NULL),
  -- User 10
  (10, 10, 'Certified Writer', 'National Writers Association', '2021-09-03', NULL);
  

-- Insert experience for each user
INSERT INTO `skill` (`resume_id`, `user_id`, `skill`)
VALUES
  -- User 1
  (1, 1, 'PHP'),
  (1, 1, 'JavaScript'),
  (1, 1, 'HTML'),
  (1, 1, 'CSS'),
  -- User 2
  (2, 2, 'JavaScript'),
  (2, 2, 'Python'),
  (2, 2, 'C#'),
  -- User 3
  (3, 3, 'Java'),
  (3, 3, 'C#'),
  -- User 4
  (4, 4, 'Python'),
  (4, 4, 'ReactJS'),
  (4, 4, 'VueJS'),
  -- User 5
  (5, 5, 'Leadership'),
  -- User 6
  (6, 6, 'PHP'),
  -- User 7
  (7, 7, 'HTML'),
  -- User 8
  (8, 8, 'C++'),
  -- User 9
  (9, 9, 'Team Working'),
  -- User 10
  (10, 10, 'Research Skills');

-- Insert working history for each user
INSERT INTO `working_history` (`resume_id`, `user_id`, `position`, `company_name`, `duration`, `tasks`)
VALUES
  -- User 1
  (1, 1, 'Web Developer', 'ABC Company', 0, 'Developed and maintained custom websites and web applications using HTML, CSS, JavaScript, and PHP. Collaborated with clients and designers to ensure project accuracy and completed projects on time.'),
  (1, 1, 'Web Developer', 'ABllC Company', 1, 'Developed and maintained custom websites and web applications using HTML, CSS, JavaScript, and PHP.'),
  -- User 2
  (2, 2, 'Business Analyst', 'XYZ Corporation', 5, 'Worked closely with key stakeholders to model business processes, gather and define business requirements. Conducted system analysis, developed use cases and prepared functional specifications.'),
  -- User 3
  (3, 3, 'Senior Accountant', 'Super Accounting Firm', 6, 'Conducted multiple audits of firms and provided internal control analysis while communicating documents and performing fieldwork.'),
  -- User 4
  (4, 4, 'Software Developer', 'Global Software Solutions', 4, 'Coded, tested and deployed software applications, APIs and software libraries. Worked in a team environment with frequent code reviews.'),
  -- User 5
  (5, 5, 'Associate Electrical Engineer', 'Electricity Innovations', 4, 'Constructed, implemented and analyzed electrical testing to provide safety and optimization in electrical products. Collaborated in a team environment to ensure goal completion.'),
  -- User 6
  (6, 6, 'Administrative Assistant', 'Super Industries, Inc.', 4, 'Answered calls and greeted visitors, assigned schedules and acted as the point of contact for all executive appointments.'),
  -- User 7
  (7, 7, 'Customer Service Representative', 'Helpful Corp.', 1, 'Provided top-notch customer service using voice and digital channels. Provided solutions to consumer problems by escalating larger issues to management staff when necessary.'),
  -- User 8
  (8, 8, 'Marketing Coordinator', 'Marketing Firm', -1, 'Designed and implemented digital marketing campaigns using a variety of mediums on channels like LinkedIn, Instagram, and Twitter. Analyzed campaign success and made recommendations for updates to the company strategy.'),
  -- User 9
  (9, 9, 'Mechanical Engineer', 'Mechanical Industries, LLC', 5, 'Researched, designed and created mechanical systems in machines and structures. Collaborated with a team to ensure the completion of important projects.'),
  -- User 10
  (10, 10, 'Content Writer', 'Content Creation, Inc.', 5, 'Wrote engaging content across a variety of web products, ranging from press releases to landing pages to full-fledged articles. Worked with clients to develop content strategies that were appropriate to their specific needs.');

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

INSERT INTO `reference` (`resume_id`, `user_id`, `name`, `email`, `phone`, `relationship`)
VALUES
(1, 1, 'Sarah Lee', 'sarahlee@email.com', '0421412421', 'Former Manager'),

(1, 1, 'David Kim', 'davidkim@email.com', '0123456779', 'Former Colleague'),

(2, 2, 'Mark Chen', 'markchen@email.com', '0123457789', 'Former Manager'),

(2, 2, 'Emily Wang', 'emilywang@email.com', '0127456789', 'Former Tutor'),

(3, 3, 'Amy Zhang', 'amyzhang@email.com', '0123456689', 'Former Manager'),

(3, 3, 'Michael Li', 'michaelli@email.com', '0123456769', 'Former Colleague'),

(4, 4, 'Jennifer Kim', 'jenniferkim@email.com', '0823456789', 'Former Supervisor'),

(5, 5, 'Daniel Cho', 'danielcho@email.com', '0825456789', 'Former Colleague'),

(6, 6, 'Andrew Kwon', 'andrewkwon@email.com', '0923456789', 'Former Manager'),

(8, 8, 'Jessica Park', 'jessicapark@email.com', '023456789', 'Former Colleague');