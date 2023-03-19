# Project description

For this project our team will be building an iClicker clone.

We will build a polling platform that will allow the instructor to interact with the user by posting poll questions on the platform and the user can participate in the poll, by checking into the active session and submitting their responses. Our application will be web-based.

The users should be able to sign up for an account if they are a new user or login into an existing account.

After logging in the students should be able to see the classes they are enrolled in. The students should be able to join a class by selecting the course for which they will join the class and clicking join once the instructor has started the session.

Instructor






Their response for the active pole will be recorded by the platform and they will receive instant feedback to their responses. The platform will use the observer design pattern to send notification to the instructor of the student responses. The facade design pattern will be used to simplify the interface between the user and the main system. 

Observer design pattern: It uses the one to many dependency concept between objects. When one object changes the other object dependent on it are notified and changed accordingly. When a option is selected the system is notified and the dependent features are updated accordingly and the response gets submitted to the instructor and recorded.


Facade design pattern: The facade design pattern will enable the user to easily access the systems functionality using a facade class.

Apart from this, our system should use Continuous Integration and Deployment (CI/CD) to ensure our platform is continuously updated to merge new features and fix any bugs. We shall enable automated testing and deploy quickly without errors. We will use dockerized deployment.




