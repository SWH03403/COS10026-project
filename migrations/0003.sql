INSERT INTO job_category(name) VALUES
	/* 1 */ ('AI Engineer'),
	/* 2 */ ('Cyber Security'),
	/* 3 */ ('Infrastructure Management'),
	/* 4 */ ('Quality Assurance'),
	/* 5 */ ('Software Development'),
	/* 6 */ ('Tech Support');

INSERT INTO job(
	id, category_id, company, superior,
	name, location,
	salary_min, salary_max, salary_currency, exp_min, exp_max,
	description
) VALUES (
	'LCI52', 1, 'Pacific Ridge Insights', 'Director of Machine Learning',
	'Senior Machine-Learning Engineer', 'San Francisco, United States',
	150000, 195000, 'USD', 5, 8,
	'Design, train, and deploy production-scale ML models for recommendation and personalization systems. Collaborate with product and engineering to integrate models into user-facing services and monitor performance in production.'
), (
	'HAO39', 1, 'Aurora Dataworks', 'Head of AI Engineering',
	'Computer Vision Specialist', 'Toronto, Canada',
	110000, 140000, 'CAD', 4, 6,
	'Develop and deploy computer vision models for image and video analysis pipelines, including data augmentation, annotation tooling, and inference at scale'
), (
	'MDS91', 1, 'North Harbor Analytics', 'Head of Data Engineering',
	'Machine-Learning Platform Engineer', 'London, United Kingdom',
	95000, 125000, 'GBP', 4, 7,
	'Build and maintain machine-learning infrastructures: model training pipelines, feature stores, experiment tracking, and deployment tooling to enable rapid iteration for machine-learning teams.'
), (
	'ZBA91', 1, 'Meridian Retail Labs', 'Lead ML Engineer',
	'Junior AI/Machine-Learning Engineer', 'Berlin, Germany',
	45000, 65000, 'EUR', 0, 2,
	'Support model development and evaluation, prepare datasets, run experiments, and help deploy models under guidance from senior engineers.'
), (
	'VEE49', 1, 'Clearview Financial Systems', 'Director of Research',
	'Natural-Language-Processor Specialist', 'Sydney, Australia',
	140000, 180000, 'AUD', 4, 7,
	'Develop state-of-the-art NLP models for financial document understanding, information extraction, and question-answering systems. Work closely with research scientists and product teams to deploy models that meet regulatory and accuracy requirements.'
), (
	'AIU64', 5, 'Meridian Pixelworks', 'Senior Engineering Lead',
	'Full-Stack Software Engineer', 'Dublin, Ireland',
	70000, 95000, 'EUR', 3, 5,
	'Build end-to-end features across frontend and backend, collaborate with product/design to deliver user-facing web applications, and maintain CI/CD pipelines.'
	), (
	'COR46', 5, 'Blue Mesa Systems', 'Engineering Manager',
	'Senior Backend Developer', 'Austin, United States',
	140000, 180000, 'USD', 5, 8,
	'Design and implement scalable backend services and APIs, own core system components, and drive architectural improvements for high-throughput applications.'
), (
	'IUC60', 5, 'Harborlight Mobile', 'Mobile Engineering Manager',
	'Mobile Application Engineer (iOS / Android)', 'Vancouver, Canada',
	100000, 125000, 'CAD', 3, 6,
	'Develop and maintain native and cross-platform mobile applications, deliver performant UX, and integrate apps with backend services and push-notification systems.'
), (
	'ZHA71', 3, 'Red Lantern Infrastructure', 'Head of IT Department',
	'Senior Systems Administrator', 'Shenzhen, China',
	220000, 320000, 'CNY', 4, 7,
	'Maintain and operate the company''s mixed cloud and on-prem infrastructure, ensure system availability and security, manage backups and disaster recovery, and support platform automation and monitoring.'
), (
	'JNW01', 2, 'KumoShield Security Corp.', 'Head of Infrastructure',
	'Threat Intelligence Analyst', 'Tokyo, Japan',
	8500000, 11500000, 'JPY', 4, 7,
	'Operate and secure hybrid infrastructure, manage identity and access, ensure system availability, and support incident response and forensics for security-focused services.'
), (
	'VKE99', 2, 'LotusGuard CyberTech', 'Infrastructure & Security Manager',
	'Senior Cryptography Engineer', 'Ho Chi Minh City, Vietnam',
	420000000, 650000000, 'VND', 6, 8,
	'Manage and secure on-prem and cloud systems, implement monitoring and backup strategies, and collaborate with SOC teams to respond to security incidents and maintain compliance.'
);


INSERT INTO job_requirement(id, name, value) VALUES
	('LCI52', 'langs', 'Python, SQL'),
	('LCI52', 'tools', 'TensorFlow or PyTorch, scikit-learn, and Docker'),
	('LCI52', 'opt-1', 'Lead model architecture reviews and mentorship for junior engineers'),
	('LCI52', 'opt-2', 'Implement model monitoring, drift detection, and A/B testing'),
	('LCI52', 'opt-3', 'Optimize model serving latency and cost on cloud platforms (AWS/GCP)'),
	('LCI52', 'opt-4', 'Collaborate on data labeling strategies and feature stores');
