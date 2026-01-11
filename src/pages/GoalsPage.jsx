import { useState } from 'react'
import { Link } from 'react-router-dom'

export default function GoalsPage() {
  const [goals, setGoals] = useState([
    { id: 1, title: 'Learn React Hooks', progress: 75, dueDate: '2024-12-31', category: 'Frontend' },
    { id: 2, title: 'Master TypeScript', progress: 50, dueDate: '2025-01-31', category: 'Language' },
    { id: 3, title: 'Build 3 Projects', progress: 33, dueDate: '2024-11-30', category: 'Development' },
  ])

  const [showForm, setShowForm] = useState(false)
  const [newGoal, setNewGoal] = useState({ title: '', category: '', dueDate: '' })

  const handleAddGoal = (e) => {
    e.preventDefault()
    if (newGoal.title && newGoal.category && newGoal.dueDate) {
      setGoals([
        ...goals,
        {
          id: goals.length + 1,
          title: newGoal.title,
          progress: 0,
          dueDate: newGoal.dueDate,
          category: newGoal.category,
        },
      ])
      setNewGoal({ title: '', category: '', dueDate: '' })
      setShowForm(false)
    }
  }

  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
      <header className="bg-white shadow-md sticky top-0 z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-between items-center">
          <Link to="/dashboard" className="text-2xl font-bold text-gray-900 hover:text-indigo-600 transition">
            🎯 Learning Streak Tracker
          </Link>
          <nav className="hidden md:flex space-x-6">
            <Link to="/dashboard" className="text-gray-700 hover:text-indigo-600 font-medium transition">Dashboard</Link>
            <Link to="/goals" className="text-gray-700 hover:text-indigo-600 font-medium transition">Goals</Link>
            <Link to="/checkin" className="text-gray-700 hover:text-indigo-600 font-medium transition">Check-in</Link>
            <Link to="/profile" className="text-gray-700 hover:text-indigo-600 font-medium transition">Profile</Link>
          </nav>
          <button className="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
            Logout
          </button>
        </div>
      </header>

      <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div className="flex justify-between items-center mb-8">
          <h1 className="text-4xl font-bold text-gray-900">Your Learning Goals</h1>
          <button
            onClick={() => setShowForm(!showForm)}
            className="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition"
          >
            {showForm ? 'Cancel' : '+ Add Goal'}
          </button>
        </div>

        {/* Add Goal Form */}
        {showForm && (
          <div className="bg-white rounded-lg shadow-lg p-8 mb-8">
            <form onSubmit={handleAddGoal} className="space-y-4">
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">Goal Title</label>
                  <input
                    type="text"
                    value={newGoal.title}
                    onChange={(e) => setNewGoal({ ...newGoal, title: e.target.value })}
                    placeholder="e.g., Learn React Context API"
                    className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                  />
                </div>
                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">Category</label>
                  <input
                    type="text"
                    value={newGoal.category}
                    onChange={(e) => setNewGoal({ ...newGoal, category: e.target.value })}
                    placeholder="e.g., Frontend"
                    className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                  />
                </div>
              </div>
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">Due Date</label>
                <input
                  type="date"
                  value={newGoal.dueDate}
                  onChange={(e) => setNewGoal({ ...newGoal, dueDate: e.target.value })}
                  className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                />
              </div>
              <button
                type="submit"
                className="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 rounded-lg transition"
              >
                Create Goal
              </button>
            </form>
          </div>
        )}

        {/* Goals List */}
        <div className="grid gap-6">
          {goals.map((goal) => (
            <div key={goal.id} className="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
              <div className="flex justify-between items-start mb-4">
                <div className="flex-1">
                  <h3 className="text-2xl font-semibold text-gray-900">{goal.title}</h3>
                  <div className="flex gap-4 mt-2">
                    <span className="inline-block bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">
                      {goal.category}
                    </span>
                    <span className="text-gray-600 text-sm">Due: {goal.dueDate}</span>
                  </div>
                </div>
              </div>
              <div className="w-full bg-gray-200 rounded-full h-3">
                <div
                  className="bg-indigo-600 h-3 rounded-full transition-all duration-300"
                  style={{ width: `${goal.progress}%` }}
                ></div>
              </div>
              <p className="text-gray-600 mt-2 text-sm">{goal.progress}% Complete</p>
            </div>
          ))}
        </div>
      </main>

      <footer className="bg-gray-900 text-white mt-16 py-8">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <p>&copy; 2024 Learning Streak Tracker. Built with React & Vite.</p>
        </div>
      </footer>
    </div>
  )
}
