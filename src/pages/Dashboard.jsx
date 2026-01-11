import { useState } from 'react'
import { Link } from 'react-router-dom'

export default function Dashboard() {
  const [count, setCount] = useState(0)

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
          <button
            className="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition"
          >
            Logout
          </button>
        </div>
      </header>

      <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div className="bg-white rounded-lg shadow-lg p-8 text-center mb-12">
          <h2 className="text-3xl font-bold text-gray-900 mb-4">
            Welcome back! 🚀
          </h2>
          <p className="text-gray-600 mb-8 text-lg">
            Continue your learning journey and maintain your streak!
          </p>
          <button
            onClick={() => setCount(count + 1)}
            className="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200 ease-in-out transform hover:scale-105"
          >
            Count: {count}
          </button>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          <Link to="/checkin" className="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition transform hover:scale-105">
            <div className="text-4xl mb-4">📅</div>
            <h3 className="text-lg font-semibold text-gray-900 mb-2">Daily Check-in</h3>
            <p className="text-gray-600">Log your learning activity for today</p>
          </Link>

          <Link to="/goals" className="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition transform hover:scale-105">
            <div className="text-4xl mb-4">🎯</div>
            <h3 className="text-lg font-semibold text-gray-900 mb-2">My Goals</h3>
            <p className="text-gray-600">View and manage your learning goals</p>
          </Link>

          <Link to="/profile" className="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition transform hover:scale-105">
            <div className="text-4xl mb-4">👤</div>
            <h3 className="text-lg font-semibold text-gray-900 mb-2">Public Profile</h3>
            <p className="text-gray-600">Share your learning journey publicly</p>
          </Link>
        </div>

        {/* Stats Section */}
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6 mt-12">
          <div className="bg-white rounded-lg shadow-md p-6 text-center">
            <div className="text-4xl font-bold text-indigo-600">42</div>
            <p className="text-gray-600 mt-2">Current Streak</p>
          </div>
          <div className="bg-white rounded-lg shadow-md p-6 text-center">
            <div className="text-4xl font-bold text-green-600">89</div>
            <p className="text-gray-600 mt-2">Total Days</p>
          </div>
          <div className="bg-white rounded-lg shadow-md p-6 text-center">
            <div className="text-4xl font-bold text-blue-600">12</div>
            <p className="text-gray-600 mt-2">Active Goals</p>
          </div>
          <div className="bg-white rounded-lg shadow-md p-6 text-center">
            <div className="text-4xl font-bold text-purple-600">156</div>
            <p className="text-gray-600 mt-2">Total Hours</p>
          </div>
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
