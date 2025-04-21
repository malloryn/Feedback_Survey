from flask import Flask, request, jsonify, render_template
import csv

app = Flask(__name__)

# Store survey responses in a CSV file
csv_file = 'responses.csv'

# Initialize the CSV file with headers if it doesn't exist
with open(csv_file, 'w', newline='') as file:
    writer = csv.writer(file)
    writer.writerow(["question1", "question2"])

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/submit', methods=['POST'])
def submit():
    data = request.form
    with open(csv_file, 'a', newline='') as file:
        writer = csv.writer(file)
        writer.writerow([data['question1'], data['question2']])
    return jsonify({"message": "Response recorded!"})

if __name__ == '__main__':
    app.run(debug=True)
