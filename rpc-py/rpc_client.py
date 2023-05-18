import xmlrpc.client

# Create a client
client = xmlrpc.client.ServerProxy("http://localhost:8000/")

# Call the remote procedure
number_of_students = int(input("Enter the number of student : "))

scores = []
for student in range(number_of_students):
    score = int(input(f"Enter student {student+1} grade (1-100) : "))
    scores.append(score)

print(f"Data Scores : {scores}")

# menu operation
while True:
    print("Menu: \n1. Mean\n2. Median\n3. Mode")
    operation = input("Select operation by number (example = 1) : ")
    if operation == "1":
        result = client.mean(scores)
        print(f"Mean : {result}")
    elif operation == "2":
        result = client.median(scores)
        print(f"Median : {result}")
    elif operation == "3":
        result = client.mode(scores)
        print(f"Mode (most frequently) : {result}")
    else:
        print("There are no menu selected! Please select menu from 1-3")

    try_again = input("Do you want to compute again? (yes/no) : ")
    if try_again != "yes":
        break
print("Thank you for using this program!")