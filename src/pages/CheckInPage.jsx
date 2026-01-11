import { useState } from 'react'
import { Link } from 'react-router-dom'

export default function CheckInPage() {
  const [checkins, setCheckins] = useState([
    { id: 1, date: '2024-11-21', duration: '2.5 hours', notes: 'Completed React Hooks module', goal: 'Learn React Hooks' },
    { id: 2, date: '2024-11-20', duration: '1.5 hours', notes: 'Studied TypeScript basics', goal: 'Master TypeScript' },
  ])

  const [showForm, setShowForm] = useState(false)
  const [newCheckin, setNewCheckin] = useState({ duration: '', notes: '', goal: '' })

  const handleAddCheckin = (e) => {
    e.preventDefault()
    if (newCheckin.duration && newCheckin.notes && newCheckin.goal) {
      setCheckins([
        {
          id: checkins.length + 1,
          date: new Date().toISOString().split('T')[0],
          duration: newCheckin.duration,
          notes: newCheckin.notes,
          goal: newCheckin.goal,
        },
        ...checkins,
      ])
      setNewCheckin({ duration: '', notes: '', goal: '' })
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
          <h1 className="text-4xl font-bold text-gray-900">Daily Check-in</h1>
          <button
            onClick={() => setShowForm(!showForm)}
            className="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition"
          >
            {showForm ? 'Cancel' : '+ Log Activity'}
          </button>
        </div>

        {/* Check-in Form */}
        {showForm && (
          <div className="bg-white rounded-lg shadow-lg p-8 mb-8">
            <form onSubmit={handleAddCheckin} className="space-y-4">
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">Duration (e.g., 2.5 hours)</label>
                  <input
                    type="text"
                    value={newCheckin.duration}
                    onChange={(e) => setNewCheckin({ ...newCheckin, duration: e.target.value })}
                    placeholder="2.5 hours"
                    className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                  />
                </div>
                <div>
                  <label className="block text-sm font-medium text-gray-700 mb-2">Associated Goal</label>
                  <input
                    type="text"
                    value={newCheckin.goal}
                    onChange={(e) => setNewCheckin({ ...newCheckin, goal: e.target.value })}
                    placeholder="e.g., Learn React Hooks"
                    className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                  />
                </div>
              </div>
              <div>
                <label className="block text-sm font-medium text-gray-700 mb-2">What did you learn?</label>
                <textarea
                  value={newCheckin.notes}
                  onChange={(e) => setNewCheckin({ ...newCheckin, notes: e.target.value })}
                  placeholder="Share what you learned today..."
                  rows="4"
                  className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                ></textarea>
              </div>
              <button
                type="submit"
                className="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 rounded-lg transition"
              >
                Log Check-in
              </button>
            </form>
          </div>
        )}

        {/* Check-ins Timeline */}
        <div className="space-y-4">
          {checkins.map((checkin) => (
            <div key={checkin.id} className="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition border-l-4 border-indigo-600">
              <div className="flex justify-between items-start mb-3">
                <div>
                  <h3 className="text-xl font-semibold text-gray-900">{checkin.goal}</h3>
                  <p className="text-gray-600 text-sm mt-1">
                    📅 {checkin.date} • ⏱️ {checkin.duration}
                  </p>
                </div>
                <span className="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                  ✓ Completed
                </span>
              </div>
              <p className="text-gray-700">{checkin.notes}</p>
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
