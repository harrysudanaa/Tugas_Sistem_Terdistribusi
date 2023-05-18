from xmlrpc.server import SimpleXMLRPCServer


# Define the function to be exposed via RPC
def compute_mode(numbers):
    counts = {}
    max_count = 0
    mode = []

    # count the occurrences of each number
    for num in numbers:
        if num in counts:
            counts[num] += 1
        else:
            counts[num] = 1

        # Update max_count if necessary
        if counts[num] > max_count:
            max_count = counts[num]

    # Find the number(s) with the highest count
    for num, count in counts.items():
        if count == max_count:
            mode.append(num)
    return mode


def compute_median(numbers):
    # sort the numbers ascending
    sorted_numbers = sorted(numbers)

    # get length of the list
    n = len(sorted_numbers)

    # get index of middle data
    mid = n // 2

    if n % 2 == 0:
        median = (sorted_numbers[mid - 1] + sorted_numbers[mid]) / 2
    else:
        median = sorted_numbers[mid]

    return median


def compute_mean(numbers):
    mean = sum(numbers) / len(numbers)
    return mean


# Create the server
server = SimpleXMLRPCServer(("localhost", 8000))
print("Server listening on port 8000...")

# Register the function with the server
server.register_function(compute_mean, "mean")
server.register_function(compute_median, "median")
server.register_function(compute_mode, "mode")

# Start the server's main loop
server.serve_forever()
